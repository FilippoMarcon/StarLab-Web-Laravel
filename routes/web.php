<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PublicQuoteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuoteController as AdminQuoteController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\QuoteController as UserQuoteController;

// Public routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/starweb', [PageController::class, 'starweb'])->name('starweb');
Route::get('/stargraphics', [PageController::class, 'stargraphics'])->name('stargraphics');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/company', [PageController::class, 'company'])->name('company');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/service/{id}', [PageController::class, 'serviceDetail'])->name('service.detail');

// Auth (user)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Quote submission (public - from contact page)
Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');

// Public preventivo view (via token)
Route::get('/preventivo/{token}', [PublicQuoteController::class, 'show'])->name('preventivo.show');
Route::get('/preventivo/{token}/download/{attachment}', [PublicQuoteController::class, 'downloadAttachment'])->name('preventivo.download');
Route::get('/preventivo/{token}/deliverable/{deliverable}', [PublicQuoteController::class, 'downloadDeliverable'])->name('preventivo.deliverable');

// PayPal
Route::post('/paypal/ipn', [PaypalController::class, 'ipn'])->name('paypal.ipn');

// Checkout
Route::get('/checkout/quote/success', [CheckoutController::class, 'quoteSuccess'])->name('checkout.quote.success');
Route::get('/checkout/quote/cancel', [CheckoutController::class, 'quoteCancel'])->name('checkout.quote.cancel');

// User dashboard (protected)
Route::middleware('user')->prefix('dashboard')->name('user.')->group(function () {
    Route::get('/', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/richieste', [UserQuoteController::class, 'index'])->name('quotes.index');
    Route::get('/richieste/create', [UserQuoteController::class, 'create'])->name('quotes.create');
    Route::post('/richieste', [UserQuoteController::class, 'store'])->name('quotes.store');
    Route::get('/richieste/{quote}', [UserQuoteController::class, 'show'])->name('quotes.show');
    Route::get('/richieste/{quote}/download/{attachment}', [UserQuoteController::class, 'downloadAttachment'])->name('quotes.download');
    Route::get('/richieste/{quote}/deliverable/{deliverable}', [UserQuoteController::class, 'downloadDeliverable'])->name('quotes.deliverable');
    Route::post('/richieste/{quote}/pay', [UserQuoteController::class, 'checkout'])->name('quotes.checkout');
    Route::get('/richieste/{quote}/chat', [ChatController::class, 'messages'])->name('chat.messages');
    Route::post('/richieste/{quote}/chat', [ChatController::class, 'send'])->name('chat.send');
});

// Admin auth
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin (protected)
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/quotes', [AdminQuoteController::class, 'index'])->name('quotes.index');
    Route::get('/quotes/{quote}', [AdminQuoteController::class, 'show'])->name('quotes.show');
    Route::post('/quotes/{quote}/status', [AdminQuoteController::class, 'updateStatus'])->name('quotes.status');
    Route::post('/quotes/{quote}/deliverables', [AdminQuoteController::class, 'uploadDeliverable'])->name('quotes.deliverables.upload');
    Route::delete('/quotes/{quote}/deliverable/{deliverable}', [AdminQuoteController::class, 'destroyDeliverable'])->name('quotes.deliverables.destroy');
    Route::get('/quotes/{quote}/download/{attachment}', [AdminQuoteController::class, 'downloadAttachment'])->name('quotes.download');
    Route::get('/quotes/{quote}/deliverable/{deliverable}', [AdminQuoteController::class, 'downloadDeliverable'])->name('quotes.deliverable');
    Route::delete('/quotes/{quote}', [AdminQuoteController::class, 'destroy'])->name('quotes.destroy');
    Route::post('/quotes/{quote}/simulate-deposit', [AdminQuoteController::class, 'simulateDeposit'])->name('quotes.simulate-deposit');
    Route::post('/quotes/{quote}/simulate-final', [AdminQuoteController::class, 'simulateFinal'])->name('quotes.simulate-final');
    Route::post('/quotes/{quote}/reset-payment-simulation', [AdminQuoteController::class, 'resetPaymentSimulation'])->name('quotes.reset-payment-simulation');
    Route::get('/quotes/{quote}/chat', [ChatController::class, 'messages'])->name('chat.messages');
    Route::post('/quotes/{quote}/chat', [ChatController::class, 'send'])->name('chat.send');
});

// Sitemap
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');

// Notifications API
Route::middleware('auth')->post('/api/ping', function () {
    auth()->user()->update(['last_activity_at' => now()]);
    return response()->json(['ok' => true]);
})->name('api.ping');

Route::middleware('user')->get('/api/user/notifications', function () {
    $Quote = \App\Models\Quote::class;
    $userQuotes = $Quote::where('user_id', auth()->id())->get(['id','service_type','client_last_viewed_at','staff_notes_updated_at']);
    $quoteIds = $userQuotes->pluck('id');
    $lastStaffReplies = \Illuminate\Support\Facades\DB::table('quote_messages')
        ->whereIn('quote_id', $quoteIds)
        ->where('is_staff', true)
        ->selectRaw('quote_id, MAX(created_at) as last_reply_at')
        ->groupBy('quote_id')
        ->pluck('last_reply_at', 'quote_id');
    $items = [];

    foreach ($userQuotes as $q) {
        $lastReplyAt = $lastStaffReplies[$q->id] ?? null;
        if ($lastReplyAt && (!$q->client_last_viewed_at || \Illuminate\Support\Carbon::parse($lastReplyAt) > $q->client_last_viewed_at)) {
            $items[] = ['type' => 'staff_reply', 'text' => "Staff ha risposto a \"{$q->service_type}\"", 'url' => route('user.quotes.show', $q), 'time' => \Illuminate\Support\Carbon::parse($lastReplyAt)->diffForHumans()];
        }
        if ($q->staff_notes_updated_at && (!$q->client_last_viewed_at || $q->staff_notes_updated_at > $q->client_last_viewed_at)) {
            $items[] = ['type' => 'update', 'text' => "Il preventivo \"{$q->service_type}\" è stato aggiornato", 'url' => route('user.quotes.show', $q), 'time' => $q->staff_notes_updated_at->diffForHumans()];
        }
    }

    usort($items, fn($a, $b) => strtotime($b['time'] ?? 'now') - strtotime($a['time'] ?? 'now'));
    return response()->json(['total' => count($items), 'items' => array_slice($items, 0, 10)]);
})->name('api.user.notifications');

Route::middleware('admin')->get('/api/admin/notifications', function () {
    $Quote = \App\Models\Quote::class;
    $items = [];

    $quotes = $Quote::where('created_at', '>=', now()->subWeek())->latest()->get();
    $quoteIds = $quotes->pluck('id');
    $lastClientMsgs = \Illuminate\Support\Facades\DB::table('quote_messages')
        ->whereIn('quote_id', $quoteIds)
        ->where('is_staff', false)
        ->selectRaw('quote_id, MAX(created_at) as last_msg_at')
        ->groupBy('quote_id')
        ->pluck('last_msg_at', 'quote_id');

    foreach ($quotes as $q) {
        $isNew = !$q->staff_last_viewed_at || $q->created_at > $q->staff_last_viewed_at;
        if ($isNew) {
            $items[] = ['type' => 'new_quote', 'text' => "Nuovo preventivo da {$q->name}", 'url' => route('admin.quotes.show', $q), 'time' => $q->created_at->diffForHumans()];
        }
        $lastMsgAt = $lastClientMsgs[$q->id] ?? null;
        if ($lastMsgAt && (!$q->staff_last_viewed_at || $lastMsgAt > $q->staff_last_viewed_at)) {
            $items[] = ['type' => 'pending_reply', 'text' => "{$q->name} ha scritto un messaggio", 'url' => route('admin.quotes.show', $q), 'time' => \Illuminate\Support\Carbon::parse($lastMsgAt)->diffForHumans()];
        }
    }

    usort($items, fn($a, $b) => strtotime($b['time'] ?? 'now') - strtotime($a['time'] ?? 'now'));
    return response()->json(['total' => count($items), 'items' => array_slice($items, 0, 10)]);
})->name('api.admin.notifications');

// Catch-all (must be last)
Route::get('/{any}', [PageController::class, 'notFound'])->where('any', '.*')->name('notfound');
