<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaypalController extends Controller
{
    public function ipn(Request $request)
    {
        $data = $request->all();

        $req = 'cmd=_notify-validate';
        foreach ($data as $key => $value) {
            $req .= '&' . $key . '=' . urlencode($value);
        }

        $paypal_url = app()->environment('local')
            ? 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr'
            : 'https://ipnpb.paypal.com/cgi-bin/webscr';

        $ch = curl_init($paypal_url);
        if (!$ch) {
            Log::error('PayPal IPN: curl initialization failed');
            return response('KO', 500);
        }

        curl_setopt_array($ch, [
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_POST => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POSTFIELDS => $req,
            CURLOPT_SSL_VERIFYPEER => 1,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_HTTPHEADER => ['Connection: Close'],
        ]);

        $res = curl_exec($ch);

        if (curl_errno($ch)) {
            Log::error('PayPal IPN curl error: ' . curl_error($ch));
            curl_close($ch);
            return response('KO', 500);
        }

        curl_close($ch);

        if (strcmp($res, 'VERIFIED') !== 0) {
            Log::warning('PayPal IPN: invalid response: ' . $res);
            return response('OK', 200);
        }

        if (($data['payment_status'] ?? '') !== 'Completed') {
            Log::info('PayPal IPN: payment not completed: ' . ($data['payment_status'] ?? 'none'));
            return response('OK', 200);
        }

        $expected_email = 'starlabdesign@gmail.com';
        $receiver_email = $data['receiver_email'] ?? $data['business'] ?? '';
        if (strtolower($receiver_email) !== strtolower($expected_email)) {
            Log::warning("PayPal IPN: receiver email mismatch: $receiver_email");
            return response('OK', 200);
        }

        $custom = $data['custom'] ?? '';
        $payload = json_decode($custom, true);

        if (!$payload || !isset($payload['quote_id'])) {
            Log::warning('PayPal IPN: invalid custom data: ' . $custom);
            return response('OK', 200);
        }

        $quote = Quote::find($payload['quote_id']);
        if (!$quote) {
            Log::warning("PayPal IPN: quote not found: {$payload['quote_id']}");
            return response('OK', 200);
        }

        $paymentType = $payload['type'] ?? 'final';
        $txn_id = $data['txn_id'] ?? '';

        if ($paymentType === 'deposit') {
            if ($quote->hasPaidDeposit()) {
                Log::info("PayPal IPN: deposit already paid for quote {$quote->id}");
                return response('OK', 200);
            }
            if ($txn_id) {
                $existing = Quote::where('deposit_paypal_txn_id', $txn_id)->first();
                if ($existing) {
                    Log::info("PayPal IPN: duplicate deposit txn_id: $txn_id");
                    return response('OK', 200);
                }
            }
            $quote->update([
                'deposit_paid_at' => now(),
                'deposit_paypal_txn_id' => $txn_id ?: null,
                'status' => 'in_progress',
            ]);
            $quote->update([
                'staff_notes' => 'L\'acconto del 50% è stato ricevuto! Iniziamo a lavorare alla tua grafica.',
                'staff_notes_updated_at' => now(),
            ]);
            $quote->logActivity('deposit.paid', 'Acconto del 50% pagato da ' . ($quote->email ?? 'cliente'));
            Log::info("PayPal IPN: deposit completed for quote {$quote->id}");
        } else {
            if ($quote->isPaid()) {
                Log::info("PayPal IPN: quote {$quote->id} already fully paid");
                return response('OK', 200);
            }
            if (!$quote->hasPaidDeposit()) {
                Log::warning("PayPal IPN: final payment before deposit for quote {$quote->id}");
                return response('OK', 200);
            }
            if ($txn_id) {
                $existing = Quote::where('paypal_txn_id', $txn_id)->first();
                if ($existing) {
                    Log::info("PayPal IPN: duplicate final txn_id: $txn_id");
                    return response('OK', 200);
                }
            }
            $quote->update([
                'paid_at' => now(),
                'paypal_txn_id' => $txn_id ?: null,
            ]);
            $quote->update([
                'staff_notes' => 'Il saldo finale è stato ricevuto con successo! Puoi scaricare le versioni originali senza watermark.',
                'staff_notes_updated_at' => now(),
            ]);
            $quote->logActivity('final.paid', 'Saldo del 50% pagato da ' . ($quote->email ?? 'cliente'));
            Log::info("PayPal IPN: final payment completed for quote {$quote->id}");
        }

        return response('OK', 200);
    }
}
