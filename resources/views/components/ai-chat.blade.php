<div id="ai-chat">
    <button id="ai-chat-toggle" class="fixed bottom-6 right-6 z-40 w-14 h-14 rounded-full shadow-lg transition-all duration-300 hover:scale-105 flex items-center justify-center bg-slate-900 text-white shadow-yellow-500/20 dark:bg-zinc-900 dark:border dark:border-zinc-800" aria-label="Apri chat AI">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        <span class="absolute -top-1 -right-1 w-4 h-4 bg-yellow-500 rounded-full border-2 border-white animate-bounce"></span>
    </button>

    <div id="ai-chat-window" class="fixed z-40 inset-x-0 bottom-0 sm:inset-auto sm:bottom-6 sm:right-6 flex flex-col items-end pointer-events-none">
        <div id="ai-chat-panel" class="w-full h-[85vh] sm:w-[400px] sm:h-[550px] rounded-t-3xl sm:rounded-2xl flex flex-col overflow-hidden shadow-2xl border transition-all duration-300 scale-95 opacity-0 origin-bottom-right bg-white/95 border-slate-200/80 text-slate-900 dark:bg-zinc-900/95 dark:border-zinc-800/80 dark:text-zinc-100">
            <div class="p-4 border-b flex justify-between items-center backdrop-blur-xl shrink-0 transition-colors duration-300 bg-yellow-50/80 border-slate-100 dark:bg-zinc-950/80 dark:border-zinc-800/60">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-cyan-400 to-indigo-600 flex items-center justify-center shadow-lg shadow-indigo-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-black text-sm uppercase tracking-tight text-slate-900 dark:text-zinc-100">StarLab Nova AI</h3>
                        <div class="flex items-center gap-1.5">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 dark:text-zinc-400">Online</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-1.5">
                    <button id="ai-chat-dark-toggle" class="transition-colors p-2 rounded-lg cursor-pointer text-slate-600 hover:text-slate-900 hover:bg-slate-100 dark:text-yellow-400 dark:hover:text-yellow-300 dark:hover:bg-zinc-800" aria-label="Toggle Dark Mode">
                        <svg class="w-[18px] h-[18px] dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        <svg class="w-[18px] h-[18px] hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </button>
                    <button id="ai-chat-close" class="transition-colors p-2 rounded-lg cursor-pointer text-slate-400 hover:text-slate-900 hover:bg-slate-100 dark:text-zinc-400 dark:hover:text-white dark:hover:bg-zinc-800" aria-label="Close chat">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>

            <div id="ai-chat-messages" class="flex-1 overflow-y-auto p-4 space-y-4 scroll-smooth transition-colors duration-300 bg-slate-50/50 dark:bg-zinc-950/50">
                <div class="flex justify-start">
                    <div class="max-w-[85%] p-3 rounded-2xl text-sm leading-relaxed shadow-sm rounded-tl-none bg-white text-slate-700 border border-slate-100 dark:bg-zinc-800/80 dark:text-zinc-200 dark:border-zinc-700/60">
                        Ciao! Sono Nova AI, l'assistente virtuale di StarLab. Come posso aiutarti oggi?
                    </div>
                </div>
            </div>

            <div class="p-4 border-t shrink-0 pb-safe transition-colors duration-300 bg-white border-slate-100 dark:bg-zinc-950/80 dark:border-zinc-800/60">
                <form id="ai-chat-form" class="relative">
                    <input
                        id="ai-chat-input"
                        type="text"
                        placeholder="Scrivi un messaggio..."
                        autocomplete="off"
                        class="w-full rounded-full py-3 px-5 pr-12 text-sm transition-all focus:outline-none focus:ring-1 bg-slate-50 border border-slate-200 text-slate-900 focus:border-yellow-500 focus:ring-yellow-500 placeholder:text-slate-400 dark:bg-zinc-900 dark:border-zinc-800 dark:text-zinc-100 dark:focus:border-yellow-500 dark:focus:ring-yellow-500 dark:placeholder:text-zinc-600"
                    />
                    <button type="submit" id="ai-chat-send" class="absolute right-2 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full flex items-center justify-center transition-all bg-slate-900 hover:bg-slate-800 text-white dark:bg-yellow-500 dark:hover:bg-yellow-400 dark:text-zinc-950" aria-label="Send">
                        <svg class="w-[14px] h-[14px]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    </button>
                </form>
                <div class="mt-2 text-center">
                    <span class="text-[10px] flex items-center justify-center gap-1 text-slate-500 dark:text-zinc-500">
                        Powered by Gemini
                        <svg class="w-[8px] h-[8px] text-indigo-400 animate-pulse" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #ai-chat-messages::-webkit-scrollbar { width: 4px; }
    #ai-chat-messages::-webkit-scrollbar-track { background: transparent; }
    #ai-chat-messages::-webkit-scrollbar-thumb { background: rgba(148,163,184,0.3); border-radius: 4px; }
    .dark #ai-chat-messages::-webkit-scrollbar-thumb { background: rgba(63,63,70,0.4); }
    @media (max-width: 639px) {
        #ai-chat-panel { border-radius: 1.5rem 1.5rem 0 0 !important; }
    }
</style>

<script>
(function() {
var API_KEY = 'AIzaSyBU9t9yvQrUn0e9uGomTWPfFcyq5HxTUHU';
var API_URL = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=' + API_KEY;

var SYSTEM_INSTRUCTION = [
    'Sei "StarLab AI", l\'assistente virtuale di StarLab.',
    '',
     'REGOLA FONDAMENTALE 1: DEVI sempre rispondere con i prezzi REALI del listino qui sotto. NON dire mai all\'utente di andare su Discord per vedere i prezzi.',
     'REGOLA FONDAMENTALE 2: Se l\'utente chiede "come posso richiedere/ordinare/comprare", digli di usare il form contatti sul sito alla pagina /contact. NON mandarlo su Discord.',
    'REGOLA FONDAMENTALE 3: Rispondi SOLO a domande su StarLab. Ignora domande fuori tema.',
    'REGOLA FONDAMENTALE 4: Parla come se l\'azienda fosse tua (usa "noi", "il nostro servizio").',
    'REGOLA FONDAMENTALE 5: Sii sempre gentile, comprensivo e dai risposte complete.',
    'REGOLA FONDAMENTALE 6: Puoi usare **testo** per scrivere in grassetto (verrà renderizzato correttamente).',
     'REGOLA FONDAMENTALE 7: Se l\'utente chiede "una grafica per server Minecraft" in generale, spiega subito che ha 3 opzioni. La prima, più economica: **Thumbnail & Social** (**€10/€15**) per grafica semplice come annunci, aperture server, social media. La seconda: **Grafica Avanzata** (**€30/€45**) per banner lunghi e complessi con molti dettagli, effetti particellari e render 3D (es. banner stile Minecraft Italia). La terza: **Minecraft Network** (**€65/€95**) è un bundle completo con Logo Server + Banner + Icona + Grafica Annunci. Non dare per scontato che voglia la più costosa - chiedi cosa preferisce o proponi la più adatta in base alla descrizione.',
    'REGOLA FONDAMENTALE 8: Metti i prezzi in **grassetto** per farli risaltare (es. **€30**).',
     'REGOLA IMPORTANTE: "Grafica Avanzata" (€30/€45) è per grafica complessa: banner lunghi con tante informazioni, effetti particellari, render 3D personaggio (es. banner stile Minecraft Italia). Per grafica più semplice (annunci, aperture server, social) c\'è "Thumbnail & Social" (€10/€15) che costa meno. "Minecraft Network" (€65/€95) è un BUNDLE che include Logo Server + Banner MC Italia + Icona Server + Grafica Annunci.',
    '',
    'LISTINO PREZZI COMPLETO (USA QUESTI PREZZI, NON INVIARE SU DISCORD):',
    '',
    'SERVIZI SINGOLI STARGRAPHICS:',
     '- Thumbnail & Social: €10 (Standard) / €15 (Premium). Include: thumbnail YouTube, grafica annunci, social media, aperture server. Revisioni illimitate. File sorgente +€5 extra.',
     '- Logo Design: €25 (Standard) / €40 (Premium). Include: vettoriale SVG/AI, 3 concept iniziali, uso commerciale.',
     '- Banner: €20 (Standard) / €30 (Premium). Include: banner per canali YouTube, server, social. Stile personalizzato.',
     '- Grafica Avanzata: €30 (Standard) / €45 (Premium). Include: effetti particellari, render 3D personaggio. Ideale per banner lunghi e complessi con molte informazioni (es. banner stile Minecraft Italia).',
    '',
    'BUNDLE STARGRAPHICS:',
     '- Starter Pack (Logo + Banner + 1 Thumbnail/Social): €40 (Standard) / €60 (Premium).',
     '- Creator Bundle (Logo + Banner + 5 Thumbnail/Social + Supporto Prioritario): €75 (Standard) / €110 (Premium). PIU POPOLARE.',
    '- Minecraft Network (Logo Server + Banner MC Italia + Icona Server + Grafica Annunci): €65 (Standard) / €95 (Premium).',
    '',
    'MODALITA PREMIUM: Priorità assoluta, il progetto scavalca la coda e riceve attenzione immediata.',
    '',
    'SERVIZI STARWEB:',
    '- Siti Web Moderni: landing page ad alta conversione e siti vetrina.',
    '- Siti Statici: veloci, sicuri, manutenzione semplice.',
    '- Performance Extreme: ottimizzazione Core Web Vitals e SEO.',
    '- Mobile First: design responsive per tutti i dispositivi.',
    '- Tech Stack: React, Next.js, TypeScript, Tailwind CSS, Node.js.',
     '- Per i prezzi dei servizi web: contattaci via form contatti sul sito per un preventivo personalizzato.',
     '',
     'INFORMAZIONI AZIENDALI:',
     'StarLab è un\'agenzia digitale con due divisioni: StarGraphics (graphic design) e StarWeb (sviluppo web).',
     'Sito: starlabdesign.it/contact (per richieste e preventivi)',
    'Email: starlabdesignstore@gmail.com',
    '',
    'Staff:',
    '- StarGraphics: PottoneNazionale (Creative Director, 5+ anni esperienza), Phill (UI/UX design)',
    '- StarWeb: Phill (Frontend, React, NextJS), Matrix (Project Manager), Rick (Full Stack)',
    '',
    'TERMINI E CONDIZIONI:',
    '- Pagamento: 30% anticipo non rimborsabile all\'ordine, 70% alla consegna finale.',
    '- Si accetta solo PayPal "Amici e Familiari".',
    '- Consegna: immagini con watermark, rimossi dopo pagamento finale.',
    '- Rimborsi: non possibili in nessun caso.',
    '- Diritti: passano al cliente dopo pagamento completo.',
    '- Modifiche: possibili durante il processo creativo.'
].join('\n');

document.addEventListener('DOMContentLoaded', function() {
    var toggle = document.getElementById('ai-chat-toggle');
    var window = document.getElementById('ai-chat-window');
    var panel = document.getElementById('ai-chat-panel');
    var closeBtn = document.getElementById('ai-chat-close');
    var form = document.getElementById('ai-chat-form');
    var input = document.getElementById('ai-chat-input');
    var messages = document.getElementById('ai-chat-messages');
    var sendBtn = document.getElementById('ai-chat-send');
    var darkToggle = document.getElementById('ai-chat-dark-toggle');

    var isOpen = false;
    var isLoading = false;
    var chatHistory = [];
    var historyInitialized = false;

    function initHistory() {
        if (historyInitialized) return;
        chatHistory.push({ role: 'model', parts: [{ text: 'Ciao! Sono Nova AI, l\'assistente virtuale di StarLab. Come posso aiutarti oggi?' }] });
        historyInitialized = true;
    }
    initHistory();

    function scrollToBottom() {
        messages.scrollTop = messages.scrollHeight;
    }

    darkToggle.addEventListener('click', function() {
        document.documentElement.classList.toggle('dark');
        localStorage.setItem('starlab-dark', document.documentElement.classList.contains('dark'));
    });

    function openChat() {
        isOpen = true;
        window.classList.remove('pointer-events-none');
        toggle.classList.add('hidden');
        panel.classList.remove('scale-95', 'opacity-0');
        panel.classList.add('scale-100', 'opacity-100', 'pointer-events-auto');
        setTimeout(scrollToBottom, 100);
    }

    function closeChat() {
        isOpen = false;
        panel.classList.remove('scale-100', 'opacity-100', 'pointer-events-auto');
        panel.classList.add('scale-95', 'opacity-0');
        setTimeout(function() {
            window.classList.add('pointer-events-none');
            toggle.classList.remove('hidden');
        }, 300);
    }

    toggle.addEventListener('click', openChat);
    closeBtn.addEventListener('click', closeChat);

    function addMessage(text, isUser) {
        var div = document.createElement('div');
        div.className = 'flex ' + (isUser ? 'justify-end' : 'justify-start');

        var bubble = document.createElement('div');
        var bubbleClasses = 'max-w-[85%] p-3 rounded-2xl text-sm leading-relaxed shadow-sm ';
        if (isUser) {
            bubbleClasses += 'rounded-tr-none bg-slate-900 text-white dark:bg-indigo-600';
        } else {
            bubbleClasses += 'rounded-tl-none bg-white text-slate-700 border border-slate-100 dark:bg-zinc-800/80 dark:text-zinc-200 dark:border-zinc-700/60';
        }
        bubble.className = bubbleClasses;
        var html = text.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    html = html.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');
    var lines = html.split('\n');
    var out = [], inUl = false;
    for (var i = 0; i < lines.length; i++) {
        var line = lines[i].trim();
        var bullet = line.match(/^\*\s+(.+)/);
        if (bullet) {
            if (!inUl) { out.push('<ul class="list-disc list-inside space-y-0.5 my-1">'); inUl = true; }
            out.push('<li>' + bullet[1] + '</li>');
        } else {
            if (inUl) { out.push('</ul>'); inUl = false; }
            if (line) { out.push('<p class="mb-1">' + line + '</p>'); } else { out.push('<br>'); }
        }
    }
    if (inUl) out.push('</ul>');
    bubble.innerHTML = out.join('');
        div.appendChild(bubble);
        messages.appendChild(div);
        scrollToBottom();
    }

    function addLoadingIndicator() {
        var div = document.createElement('div');
        div.id = 'ai-chat-loading';
        div.className = 'flex justify-start';
        div.innerHTML = '<div class="p-3 rounded-2xl rounded-tl-none border flex gap-2 items-center bg-white border-slate-100 text-slate-700 dark:bg-zinc-800/80 dark:border-zinc-700/60 dark:text-zinc-300"><svg class="w-4 h-4 animate-spin text-yellow-500" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg><span class="text-xs text-slate-400 dark:text-zinc-400">Nova sta pensando...</span></div>';
        messages.appendChild(div);
        scrollToBottom();
    }

    function removeLoadingIndicator() {
        var el = document.getElementById('ai-chat-loading');
        if (el) el.remove();
    }

    function disableInput(disabled) {
        input.disabled = disabled;
        sendBtn.disabled = disabled;
        if (disabled) {
            sendBtn.classList.add('opacity-50', 'cursor-not-allowed');
            sendBtn.classList.remove('hover:bg-slate-800', 'dark:hover:bg-yellow-400');
        } else {
            sendBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            sendBtn.classList.add('hover:bg-slate-800', 'dark:hover:bg-yellow-400');
        }
    }

    async function sendMessage(text) {
        if (!text.trim() || isLoading) return;

        addMessage(text, true);
        isLoading = true;
        disableInput(true);
        addLoadingIndicator();

        chatHistory.push({ role: 'user', parts: [{ text: text }] });

        try {
            var response = await fetch(API_URL, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    systemInstruction: {
                        parts: [{ text: SYSTEM_INSTRUCTION }]
                    },
                    contents: chatHistory
                })
            });

            removeLoadingIndicator();

            if (!response.ok) {
                var errText = await response.text();
                console.error('Gemini API Error:', response.status, errText);
                var errMsg = 'Si è verificato un errore. Riprova più tardi.';
                if (response.status === 429) {
                    errMsg = 'Troppe richieste. Attendere qualche istante e riprovare.';
                } else if (response.status === 403) {
                    errMsg = 'API Key non valida. L\'AI Assistant non è disponibile in questo ambiente.';
                } else if (response.status === 400) {
                    errMsg = 'Richiesta non valida. Prova a riformulare la domanda.';
                }
                addMessage(errMsg, false);
                chatHistory.push({ role: 'model', parts: [{ text: errMsg }] });
                return;
            }

            var data = await response.json();
            var reply = data.candidates && data.candidates[0] && data.candidates[0].content && data.candidates[0].content.parts && data.candidates[0].content.parts[0]
                ? data.candidates[0].content.parts[0].text
                : 'Mi dispiace, non ho capito la domanda. Riprova.';

            addMessage(reply, false);
            chatHistory.push({ role: 'model', parts: [{ text: reply }] });

        } catch (error) {
            removeLoadingIndicator();
            console.error('Gemini API Error:', error);
            addMessage('Si è verificato un errore. Riprova più tardi.', false);
            chatHistory.push({ role: 'model', parts: [{ text: 'Si è verificato un errore. Riprova più tardi.' }] });
        } finally {
            isLoading = false;
            disableInput(false);
            input.focus();
        }
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        var text = input.value.trim();
        if (!text) return;
        input.value = '';
        sendMessage(text);
    });
});
})();
</script>
