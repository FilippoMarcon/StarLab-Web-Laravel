@extends('user.layouts.app')

@section('title', 'StarLab | Pagamento PayPal')

@section('content')
<div class="max-w-lg mx-auto mt-12 text-center">
    <div class="p-8 bg-slate-900/50 border border-slate-800 rounded-2xl">
        <div class="mb-6">
            <div class="w-16 h-16 mx-auto bg-blue-500/20 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-blue-400" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M7.076 21.337H2.47a.641.641 0 01-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106z"/>
                </svg>
            </div>
            <h1 class="text-2xl font-black text-white mt-4">Pagamento con PayPal</h1>
            <p class="text-slate-400 mt-2">Stai per pagare <strong class="text-amber-500">&euro;{{ number_format($quote->amount, 2) }}</strong> per:</p>
            <p class="text-slate-300 font-bold mt-1">{{ $quote->service_type }}</p>
        </div>

        @php
            $isLocal = app()->environment('local');
            $paypalUrl = $isLocal ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
            $notifyUrl = route('paypal.ipn');
            $returnUrl = route('checkout.quote.success') . '?quote=' . $quote->id;
            $cancelUrl = route('checkout.quote.cancel');
            $custom = json_encode(['quote_id' => $quote->id, 'user_id' => auth()->id()]);
        @endphp

        <form action="{{ $paypalUrl }}" method="post" id="paypalForm">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="starlabdesign@gmail.com">
            <input type="hidden" name="item_name" value="Preventivo #{{ $quote->id }} - {{ $quote->service_type }}">
            <input type="hidden" name="amount" value="{{ number_format($quote->amount, 2, '.', '') }}">
            <input type="hidden" name="currency_code" value="EUR">
            <input type="hidden" name="no_shipping" value="1">
            <input type="hidden" name="notify_url" value="{{ $notifyUrl }}">
            <input type="hidden" name="return" value="{{ $returnUrl }}">
            <input type="hidden" name="cancel_return" value="{{ $cancelUrl }}">
            <input type="hidden" name="custom" value="{{ $custom }}">
            <input type="hidden" name="rm" value="1">

            <button type="submit" id="payBtn" class="w-full px-6 py-4 bg-[#ffc439] hover:bg-[#f2ba33] text-black font-bold rounded-xl transition-all flex items-center justify-center gap-3 text-lg">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M7.076 21.337H2.47a.641.641 0 01-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106z"/>
                </svg>
                Paga con PayPal
            </button>
        </form>

        <p class="text-xs text-slate-500 mt-4">
            Verrai reindirizzato a PayPal per completare il pagamento in modo sicuro.
        </p>

        <a href="{{ route('user.quotes.show', $quote) }}" class="inline-block mt-4 text-sm text-slate-500 hover:text-slate-300 transition-colors">
            &larr; Torna al preventivo
        </a>
    </div>
</div>
@endsection
