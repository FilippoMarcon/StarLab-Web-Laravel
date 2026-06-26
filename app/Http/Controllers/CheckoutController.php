<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function quoteSuccess(Request $request)
    {
        $quoteId = $request->query('quote');
        if ($quoteId) {
            $quote = Quote::find($quoteId);
            if ($quote) {
                return redirect()->route('user.quotes.show', $quote)->with('success', 'Pagamento ricevuto con successo! Attendi qualche istante per la conferma.');
            }
        }

        return redirect()->route('user.quotes.index')->with('success', 'Pagamento completato! La conferma potrebbe richiedere qualche minuto.');
    }

    public function quoteCancel()
    {
        return redirect()->route('user.quotes.index')->with('error', 'Pagamento annullato.');
    }
}
