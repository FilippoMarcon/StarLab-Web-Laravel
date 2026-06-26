@props(['quote', 'isStaff' => false])

<div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl lg:sticky lg:top-6">
    <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">
        <svg class="w-4 h-4 inline -mt-0.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        Chat
    </h3>

    <div id="chat-messages" class="space-y-3 max-h-96 overflow-y-auto mb-4 pr-2">
        @forelse ($quote->messages as $msg)
            <div class="flex {{ $msg->is_staff ? 'justify-start' : 'justify-end' }}">
                <div class="max-w-[80%] px-4 py-2.5 rounded-2xl text-sm {{ $msg->is_staff ? 'bg-slate-800 text-slate-200 rounded-bl-sm' : 'bg-amber-500/20 text-amber-200 rounded-br-sm' }}">
                    <p class="text-xs font-bold {{ $msg->is_staff ? 'text-slate-500' : 'text-amber-400' }} mb-0.5">{{ $msg->is_staff ? 'Staff' : 'Tu' }}</p>
                    <p class="whitespace-pre-wrap">{{ $msg->message }}</p>
                    <p class="text-xs text-slate-500 mt-1">{{ $msg->created_at->format('d/m H:i') }}</p>
                </div>
            </div>
        @empty
            <p class="text-sm text-slate-500 text-center py-8" id="chat-empty">Nessun messaggio. Inizia tu!</p>
        @endforelse
    </div>

    <form id="chat-form" class="flex items-center gap-2">
        <input type="text" name="message" placeholder="Scrivi un messaggio..." required maxlength="5000"
            class="flex-1 px-4 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-white text-sm focus:ring-2 focus:ring-amber-500 outline-none transition-all placeholder:text-slate-500">
        <button type="submit" class="px-4 py-2.5 bg-amber-500 hover:bg-amber-400 text-white font-bold rounded-xl transition-all text-sm whitespace-nowrap">
            Invia
        </button>
    </form>
</div>

<script>
(function() {
    const quoteId = {{ $quote->id }};
    const chatUrl = '{{ $isStaff ? route("admin.chat.messages", $quote) : route("user.chat.messages", $quote) }}';
    const sendUrl = '{{ $isStaff ? route("admin.chat.send", $quote) : route("user.chat.send", $quote) }}';
    const messagesEl = document.getElementById('chat-messages');
    const formEl = document.getElementById('chat-form');
    const emptyEl = document.getElementById('chat-empty');
    let lastId = {{ $quote->messages->max('id') ?? 0 }};

    function scrollToBottom() {
        messagesEl.scrollTop = messagesEl.scrollHeight;
    }

    function addMessage(msg) {
        if (emptyEl) emptyEl.remove();
        const div = document.createElement('div');
        div.className = 'flex ' + (msg.is_staff ? 'justify-start' : 'justify-end');
        div.innerHTML = `
            <div class="max-w-[80%] px-4 py-2.5 rounded-2xl text-sm ${msg.is_staff ? 'bg-slate-800 text-slate-200 rounded-bl-sm' : 'bg-amber-500/20 text-amber-200 rounded-br-sm'}">
                <p class="text-xs font-bold ${msg.is_staff ? 'text-slate-500' : 'text-amber-400'} mb-0.5">${msg.sender}</p>
                <p class="whitespace-pre-wrap">${escapeHtml(msg.message)}</p>
                <p class="text-xs text-slate-500 mt-1">${msg.time}</p>
            </div>
        `;
        messagesEl.appendChild(div);
        scrollToBottom();
    }

    function escapeHtml(text) {
        const d = document.createElement('div');
        d.textContent = text;
        return d.innerHTML;
    }

    formEl.addEventListener('submit', function(e) {
        e.preventDefault();
        const input = this.querySelector('input[name="message"]');
        const msg = input.value.trim();
        if (!msg) return;
        input.disabled = true;

        fetch(sendUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
            body: JSON.stringify({ message: msg })
        })
        .then(r => r.json())
        .then(data => {
            addMessage(data);
            input.value = '';
            lastId = data.id;
        })
        .catch(() => alert('Errore nell\'invio del messaggio.'))
        .finally(() => input.disabled = false);
    });

    setInterval(function() {
        if (document.hidden) return;
        fetch(chatUrl + '?after=' + lastId, { headers: { 'Accept': 'application/json' } })
        .then(r => r.json())
        .then(data => {
            data.forEach(msg => { addMessage(msg); lastId = msg.id; });
        })
        .catch(() => {});
    }, 4000);

    scrollToBottom();
})();
</script>
