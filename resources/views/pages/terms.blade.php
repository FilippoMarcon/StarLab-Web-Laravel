@extends('layouts.app')

@section('title', 'StarLab | Termini e Condizioni')

@section('content')
<section class="pt-32 pb-20 px-6">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-black text-white mb-8">Termini e Condizioni</h1>

        <div class="prose prose-invert prose-sm max-w-none space-y-6 text-slate-300">
            <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-4">
                <h2 class="text-xl font-bold text-white">1. Accettazione dei Termini</h2>
                <p>Utilizzando i servizi di StarLab, l'utente accetta integralmente i presenti termini e condizioni. Se non sei d'accordo con una qualsiasi parte dei termini, non puoi accedere ai nostri servizi.</p>
            </div>

            <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-4">
                <h2 class="text-xl font-bold text-white">2. Preventivi e Pagamenti</h2>
                <div class="space-y-3">
                    <p><strong class="text-amber-400">2.1 Richiesta Preventivo</strong><br>
                    La richiesta di preventivo tramite il sito non comporta alcun obbligo di acquisto. Il cliente riceverà una valutazione personalizzata del progetto.</p>

                    <p><strong class="text-amber-400">2.2 Acconto 50%</strong><br>
                    Per avviare la produzione della grafica è richiesto il pagamento anticipato del <strong>50%</strong> dell'importo totale concordato. Il lavoro inizierà solo dopo la ricezione confermata dell'acconto.</p>

                    <p><strong class="text-amber-400">2.3 Consegna con Watermark</strong><br>
                    La grafica finita viene consegnata al cliente con un watermark (marchio StarLab) visibile. Il file originale senza watermark non viene rilasciato fino al saldo finale.</p>

                    <p><strong class="text-amber-400">2.4 Saldo Finale 50%</strong><br>
                    Il restante <strong>50%</strong> deve essere saldato prima di ricevere i file originali senza watermark. Una volta ricevuto il saldo, il cliente potrà scaricare le versioni originali.</p>

                    <p><strong class="text-amber-400">2.5 Metodi di Pagamento</strong><br>
                    I pagamenti vengono elaborati tramite PayPal. Tutte le transazioni sono sicure e crittografate.</p>
                </div>
            </div>

            <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-4">
                <h2 class="text-xl font-bold text-white">3. Licenza e Diritti d'Uso</h2>
                <div class="space-y-3">
                    <p><strong class="text-amber-400">3.1 Diritti Commerciali</strong><br>
                    Salvo diverso accordo, il cliente riceve diritti commerciali completi sul lavoro finale pagato per intero. Il lavoro può essere utilizzato per scopi personali e commerciali senza restrizioni.</p>

                    <p><strong class="text-amber-400">3.2 Attribuzione</strong><br>
                    Non è richiesta l'attribuzione a StarLab per l'uso delle grafiche realizzate, ma è sempre apprezzata.</p>

                    <p><strong class="text-amber-400">3.3 Ritiro del Lavoro</strong><br>
                    In caso di mancato pagamento del saldo finale entro 30 giorni dalla consegna della grafica con watermark, StarLab si riserva il diritto di riutilizzare o rivendere il lavoro.</p>
                </div>
            </div>

            <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-4">
                <h2 class="text-xl font-bold text-white">4. Proprietà Intellettuale</h2>
                <p>StarLab mantiene la piena proprietà intellettuale di tutti i bozzetti, concept e versioni non finali fino al pagamento completo. Dopo il saldo totale, la proprietà del lavoro finale viene trasferita al cliente.</p>
            </div>

            <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-4">
                <h2 class="text-xl font-bold text-white">5. Garanzie e Responsabilità</h2>
                <div class="space-y-3">
                    <p><strong class="text-amber-400">5.1 Garanzia di Qualità</strong><br>
                    StarLab si impegna a fornire un lavoro di alta qualità. Se il cliente non è soddisfatto del risultato, verranno apportate fino a 3 revisioni senza costi aggiuntivi entro 14 giorni dalla consegna.</p>

                    <p><strong class="text-amber-400">5.2 Limitazione di Responsabilità</strong><br>
                    StarLab non sarà responsabile per danni indiretti, incidentali o consequenziali derivanti dall'uso dei prodotti forniti.</p>
                </div>
            </div>

            <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-4">
                <h2 class="text-xl font-bold text-white">6. Recesso e Rimborsi</h2>
                <div class="space-y-3">
                    <p><strong class="text-amber-400">6.1 Diritto di Recesso</strong><br>
                    Il cliente può recedere dall'ordine entro 14 giorni dal pagamento dell'acconto, purché il lavoro non sia ancora stato iniziato. In tal caso, l'acconto verrà rimborsato integralmente.</p>

                    <p><strong class="text-amber-400">6.2 Lavoro Iniziato</strong><br>
                    Se il lavoro è già stato iniziato, l'acconto non è rimborsabile in quanto copre le ore di progettazione già impiegate.</p>

                    <p><strong class="text-amber-400">6.3 Saldo Finale</strong><br>
                    Il saldo finale non è rimborsabile una volta pagato, in quanto il cliente ha ricevuto e approvato i file originali completi.</p>
                </div>
            </div>

            <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-4">
                <h2 class="text-xl font-bold text-white">7. Modifiche ai Termini</h2>
                <p>StarLab si riserva il diritto di modificare questi termini in qualsiasi momento. Le modifiche saranno comunicate tramite il sito. L'uso continuato dei servizi dopo le modifiche costituisce accettazione dei nuovi termini.</p>
            </div>

            <div class="p-6 bg-slate-900/50 border border-slate-800 rounded-2xl space-y-4">
                <h2 class="text-xl font-bold text-white">8. Contatti</h2>
                <p>Per qualsiasi domanda riguardante questi termini e condizioni, contattaci via email a <a href="mailto:starlabdesignstore@gmail.com" class="text-amber-500 hover:text-amber-400">starlabdesignstore@gmail.com</a> o tramite Discord.</p>
            </div>

            <p class="text-sm text-slate-500 mt-8">Ultimo aggiornamento: Giugno 2026</p>
        </div>
    </div>
</section>
@endsection