<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'title' => 'Logo Design',
            'slug' => 'logo-design',
            'description' => 'Logo professionali su misura per il tuo brand. Dal concept iniziale al file finale pronto all\'uso.',
            'content' => 'Ogni logo che realizzo parte da un\'analisi approfondita del tuo brand, del settore in cui operi e del messaggio che vuoi comunicare. Lavoro su diverse varianti fino a trovare la soluzione perfetta per te.',
            'price_from' => 80,
            'icon' => '🎯',
            'features' => json_encode(['Concept personalizzato', '2 revisioni incluse', 'File in alta risoluzione', 'Formati PNG, SVG, PDF, AI', 'Versione bianco/nero', 'Guida colori e font']),
            'delivery_time' => '3-5 giorni',
            'revisions' => '2 incluse',
            'file_formats' => 'PNG, SVG, PDF, AI, EPS',
            'active' => true,
            'sort_order' => 1,
        ]);

        Service::create([
            'title' => 'Branding',
            'slug' => 'branding',
            'description' => 'Identità visiva completa per il tuo brand. Logo, colori, font e linee guida per una comunicazione coerente.',
            'content' => 'Il branding va oltre il logo. Creo un sistema visivo completo che include palette colori, tipografia, pattern e linee guida per garantire coerenza su tutti i touchpoint del tuo brand.',
            'price_from' => 200,
            'icon' => '🎨',
            'features' => json_encode(['Logo principale e varianti', 'Palette colori completa', 'Tipografia e font', 'Carte intestate e biglietti', 'Linee guida del brand', 'Applicazioni social']),
            'delivery_time' => '5-10 giorni',
            'revisions' => '3 incluse',
            'file_formats' => 'PNG, SVG, PDF, AI, EPS',
            'active' => true,
            'sort_order' => 2,
        ]);

        Service::create([
            'title' => 'Social Media Design',
            'slug' => 'social-media-design',
            'description' => 'Grafiche per i tuoi profili social. Post, storie, cover e template per mantenere un feed coerente e professionale.',
            'content' => 'I social sono la vetrina del tuo brand. Creo contenuti visivi che catturano l\'attenzione e mantengono un\'identità coerente su tutte le piattaforme. Template personalizzabili per post, storie e cover.',
            'price_from' => 50,
            'icon' => '📱',
            'features' => json_encode(['Template post Instagram/Facebook', 'Storie animate', 'Cover profilo e banner', '10 post inclusi', 'Formato ottimizzato per social', 'Template riutilizzabile']),
            'delivery_time' => '2-4 giorni',
            'revisions' => '2 incluse',
            'file_formats' => 'PNG, JPG, Canva Template',
            'active' => true,
            'sort_order' => 3,
        ]);

        Service::create([
            'title' => 'Print Design',
            'slug' => 'print-design',
            'description' => 'Materiale cartaceo professionale. Biglietti da visita, volantini, poster, brochure e molto altro.',
            'content' => 'Il design stampato richiede attenzione ai dettagli tecnici (sangue, risoluzione, colori CMYK). Realizzo materiale print-ready per qualsiasi formato, dalla carta intestata ai grandi formati.',
            'price_from' => 40,
            'icon' => '📄',
            'features' => json_encode(['Biglietti da visita', 'Volantini e poster', 'Brochure e cataloghi', 'Carta intestata', 'Formato print-ready CMYK', 'Adatto a stampa digitale e offset']),
            'delivery_time' => '3-5 giorni',
            'revisions' => '2 incluse',
            'file_formats' => 'PDF, AI, EPS (CMYK)',
            'active' => true,
            'sort_order' => 4,
        ]);

        Service::create([
            'title' => 'Sviluppo Web',
            'slug' => 'web-development',
            'description' => 'Siti web e landing page moderni, veloci e ottimizzati per il tuo business o progetto personale.',
            'content' => 'Realizzo siti web moderni con Laravel e Tailwind CSS. Performance ottimizzate, design responsive e SEO-ready. Dal sito vetrina all\'e-commerce, ogni progetto è costruito su misura.',
            'price_from' => 300,
            'icon' => '🌐',
            'features' => json_encode(['Design responsive', 'Ottimizzazione SEO', 'Performance ottimizzate', 'Pannello di amministrazione', 'Moduli di contatto', 'Hosting incluso']),
            'delivery_time' => '7-14 giorni',
            'revisions' => '3 incluse',
            'file_formats' => 'HTML, CSS, JS, PHP',
            'active' => true,
            'sort_order' => 5,
        ]);

        Project::create([
            'title' => 'Brand Identity - TechFlow',
            'slug' => 'brand-identity-techflow',
            'category' => 'Branding',
            'description' => 'Brand identity completa per TechFlow, una startup innovativa nel settore della gestione documentale. Il progetto includeva logo, palette colori, tipografia e linee guida complete.',
            'problem' => 'TechFlow si presentava al mercato senza un\'identità visiva definita. Il logo era stato creato in fretta, non comunicava professionalità e la mancanza di coerenza sui vari canali stava danneggiando la percezione del brand.',
            'solution' => 'Ho sviluppato un sistema di identità visiva completo partendo da un logo modulare che funziona sia in versione estesa che ridotta. Palette colori ispirata alla tecnologia ma con un tocco umano, e linee guida dettagliate per garantire coerenza.',
            'concept' => 'L\'idea centrale era unire il concetto di flusso (flow) con la precisione tecnologica. Il logo principale utilizza un\'icona astratta che richiama il movimento dei dati, combinata con una tipografia pulita e moderna.',
            'client_name' => 'TechFlow Srl',
            'featured' => true,
            'sort_order' => 1,
        ]);

        Project::create([
            'title' => 'Logo - Aurora Beauty',
            'slug' => 'logo-aurora-beauty',
            'category' => 'Logo Design',
            'description' => 'Logo minimalista ed elegante per un brand di cosmetici naturali. Un marchio che comunica purezza, natura e raffinatezza.',
            'problem' => 'Aurora Beauty aveva un logo datato che non rappresentava più la qualità dei loro prodotti. Il brand stava riposizionandosi verso un target premium e aveva bisogno di un\'immagine all\'altezza.',
            'solution' => 'Ho creato un logo floreale stilizzato con linee pulite e una palette pastello. Il design funziona perfettamente sia in versione a colori che in bianco e nero.',
            'client_name' => 'Aurora Beauty',
            'featured' => true,
            'sort_order' => 2,
        ]);

        Project::create([
            'title' => 'Social Pack - FitLife',
            'slug' => 'social-pack-fitlife',
            'category' => 'Social Media',
            'description' => 'Template social e contenuti editoriali per un personal trainer. Un feed coerente che ha aumentato l\'engagement del 40%.',
            'problem' => 'FitLife aveva un feed social disordinato con grafiche diverse per ogni post. Il brand non comunicava professionalità e faticava a convertire i follower in clienti.',
            'solution' => 'Ho sviluppato un sistema di template modulari per post, storie e cover, con una palette energica che rispecchia il mindset del brand. Layout puliti con spazio per foto reali e citazioni motivazionali.',
            'client_name' => 'FitLife Italia',
            'featured' => false,
            'sort_order' => 3,
        ]);

        Post::create([
            'title' => 'Quanto costa un logo nel 2026? Guida completa ai prezzi per creator e streamer',
            'slug' => 'quanto-costa-un-logo-2026',
            'content' => "Se sei un creator, uno streamer o un piccolo brand e ti stai chiedendo quanto costa un logo professionale nel 2026, sei nel posto giusto. Non esiste una risposta unica, perché il prezzo dipende da tanti fattori: esperienza del designer, complessità del progetto, diritti d'uso e formati inclusi.\n\nIn questa guida ti spiego tutte le fasce di prezzo, cosa ottieni per ogni fascia e soprattutto come scegliere senza buttare soldi.\n\n## La fascia fai-da-te: 0-50€\n\nEsistono strumenti come Canva, Looka o Hatchful che ti permettono di creare un logo in autonomia. Spesso gratis o con un abbono mensile molto basso. Il vantaggio è che risparmi, ma il risultato è inevitabilmente generico. I template sono usati da migliaia di altre persone, non hai un marchio originale e, soprattutto, non hai un file vettoriale professionale. Se il tuo brand è piccolo e non hai budget, è un compromesso che può funzionare all'inizio, ma che dovrai aggiornare appena inizi a crescere.\n\n## La fascia freelance entry-level: 50-100€\n\nSu piattaforme come Fiverr trovi designer che realizzano loghi a prezzi bassissimi. Il risultato è generalmente migliore del fai-da-te, ma spesso i design sono comunque basati su template. Inoltre, difficilmente riceverai un vero processo creativo con brief, bozze e revisioni strutturate. Va bene se hai un budget molto limitato, ma non aspettarti un lavoro su misura.\n\n## La fascia professionale (la mia): 80-300€\n\nQuesta è la fascia in cui lavoro io. Con 80-200€ ricevi un logo completamente originale, progettato dopo un brief approfondito, con 2-3 varianti tra cui scegliere, revisioni illimitate e file pronti all'uso (PNG, SVG, PDF, AI). Il design è pensato specificamente per il tuo brand, non è un template. Per un creator o un piccolo brand, questa è la fascia di prezzo con il miglior rapporto qualità-prezzo.\n\n## Branding completo: 200-500€\n\nSe hai bisogno di un'identità visiva completa (logo, palette colori, tipografia, linee guida, applicazioni social), il prezzo sale. Un pacchetto branding completo parte da circa 200€ e può arrivare a 500€ e oltre. Include tutto il necessario per avere un'immagine coerente su tutti i canali.\n\n## Agenzie e studi: 500€+\n\nSe ti rivolgi a uno studio di branding strutturato, i prezzi partono da 500€ e possono arrivare a diverse migliaia di euro. In questo caso paghi un team, ricerche di mercato, strategia di posizionamento e linee guida dettagliatissime. È la scelta giusta se hai un'azienda con un budget dedicato al branding.\n\n## Quanto dovresti spendere davvero?\n\nLa verità è che non serve spendere 2000€ per un logo se sei un creator che sta iniziando. Ma non serve neanche spendere 20€ su Fiverr e sperare che il risultato sia professionale. Il giusto equilibrio per la maggior parte dei creator, streamer e piccoli brand è tra 80 e 200€ per un logo professionale, originale e con tutti i file pronti all'uso.\n\n## Cosa controllare prima di acquistare\n\n- Chiedi sempre file vettoriali (SVG, AI o EPS)\n- Verifica quante revisioni sono incluse\n- Controlla che il designer capisca il tuo settore\n- Assicurati che i formati siano adatti all'uso che ne farai (web, social, stampa)\n- Pretendi un processo trasparente: brief, bozze, modifiche e consegna\n\n## Conclusione\n\nInvestire in un logo professionale è uno dei primi passi per far crescere il tuo brand. Non serve spendere una fortuna, ma non serve neanche affidarsi al caso. Con 80-200€ puoi ottenere un logo di cui andare fiero e che ti rappresenta davvero.",
            'image' => null,
            'meta_title' => 'Quanto costa un logo nel 2026 | Guida ai prezzi per creator',
            'meta_description' => 'Guida completa ai prezzi dei loghi professionali nel 2026. Scopri quanto spendere per un logo da creator, streamer o piccolo brand. Consigli pratici senza fregature.',
            'published_at' => now(),
            'active' => true,
        ]);

        Post::create([
            'title' => 'Come creare un\'identità di brand forte per il tuo canale Twitch o YouTube',
            'slug' => 'come-creare-identita-brand',
            'content' => "Se sei uno streamer o un content creator, il tuo brand visivo è la prima cosa che il pubblico nota. Un'identità coerente e riconoscibile ti aiuta a farti ricordare, a trasmettere professionalità e a distinguerti in un mare di contenuti.\n\nIn questa guida ti spiego i 5 passi per creare un'identità di brand che funzioni davvero per il tuo canale.\n\n## 1. Definisci la tua personalità\n\nPrima ancora di pensare a colori e font, chiediti: chi sono? Cosa voglio comunicare? Il mio canale è serioso e informativo, o leggero e divertente? La personalità del tuo brand deve essere chiara fin dall'inizio, perché da lì deriveranno tutte le scelte visive.\n\nFai un elenco di 3-5 aggettivi che descrivono il tuo brand. Esempi: \"energico, moderno, giocoso\" oppure \"elegante, minimal, professionale\". Ogni scelta di design dovrà rispettare questi aggettivi.\n\n## 2. Scegli una palette colori coerente\n\nI colori sono il primo elemento che il tuo pubblico assocerà al tuo brand. Scegli 2-3 colori principali e usali in modo coerente su tutti i tuoi canali: overlay Twitch, banner YouTube, miniature, post Instagram, logo.\n\nConsiglio: non usare troppi colori. Due colori primari + un colore d'accento sono sufficienti. Strumenti come Coolors o Adobe Color ti aiutano a creare palette equilibrate.\n\n## 3. Crea un logo e varianti\n\nIl tuo logo è il simbolo del tuo brand. Deve funzionare in diverse dimensioni e contesti. Questo significa che ti servono:\n- Una versione orizzontale per banner e copertine\n- Una versione quadrata per icone e profili social\n- Una versione semplificata per avatar piccoli\n\nSe sei uno streamer, considera anche un logo animato per le scene di inizio e fine live.\n\n## 4. Overlay, emotes e badge personalizzati\n\nPer Twitch e YouTube, il design va oltre il logo. Overlay per le live, pannelli informativi, emotes personalizzate, badge per i sub: tutto deve seguire la stessa linea visiva. Un set coerente fa sembrare il tuo canale professionale e curato, e questo aumenta la fiducia del pubblico.\n\n## 5. Applica con costanza su tutti i canali\n\nUna volta creato il tuo brand visivo, usalo ovunque. Stessa immagine profilo, stessa copertina, stessi colori. La ripetizione crea riconoscibilità. Il tuo pubblico deve poter identificare un tuo contenuto al primo colpo d'occhio, che sia su Twitch, YouTube, Instagram o Discord.\n\n## Errori da evitare\n\n- Cambiare look ogni mese: il brand si costruisce con la costanza\n- Usare troppi font diversi: bastano 1-2 caratteri\n- Ignorare la leggibilità: un logo bello ma illeggibile non serve\n- Copiare altri creator: l'originalità paga sempre\n\n## Conclusione\n\nUn'identità di brand forte non è un lusso, è uno strumento di crescita. Che tu sia uno streamer con 10 follower o un creator con 10.000, un design coerente ti fa sembrare più professionale e aiuta il pubblico a riconoscerti e ricordarti.",
            'image' => null,
            'meta_title' => 'Come creare un brand per Twitch e YouTube | Guida creator',
            'meta_description' => 'Guida completa per creator e streamer: come creare un\'identità di brand per il tuo canale. Colori, logo, overlay, emotes e consigli pratici per distinguerti.',
            'published_at' => now(),
            'active' => true,
        ]);

        Post::create([
            'title' => 'PNG vs SVG: quale formato usare per il tuo logo da streamer e creator',
            'slug' => 'png-vs-svg-formato-logo',
            'content' => "Se hai appena ricevuto il tuo nuovo logo, probabilmente ti è stato consegnato in diversi formati. I due più comuni sono PNG e SVG, ma hanno caratteristiche molto diverse. Sapere quando usare l'uno o l'altro è fondamentale per non sbagliare.\n\nIn questa guida ti spiego le differenze in modo semplice e pratico, con esempi d'uso reali per creator, streamer e content maker.\n\n## Cos'è un file PNG?\n\nIl PNG (Portable Network Graphics) è un formato raster. Cosa significa? Che è composto da pixel, come una foto. Se lo ingrandisci troppo, perde qualità e diventa sgranato. Però ha un vantaggio enorme: è compatibile con qualsiasi programma e piattaforma, supporta la trasparenza (fondamentale per un logo!) e ha dimensioni contenute.\n\n### Quando usare PNG\n- Per caricare il tuo logo su Twitch, YouTube, Instagram, Discord\n- Per inserirlo in documenti, presentazioni, email\n- Per le miniature dei video\n- Per la stampa domestica (non professionale)\n\n### Attenzione a:\n- Non ingrandire mai un PNG oltre la sua risoluzione originale\n- Non usare PNG per stampe grandi (poster, striscioni)\n- Se perdi il file originale, non puoi \"recuperare\" dettagli da un PNG piccolo\n\n## Cos'è un file SVG?\n\nL'SVG (Scalable Vector Graphics) è un formato vettoriale. Invece di memorizzare pixel, memorizza forme matematiche. Il risultato? Puoi ingrandirlo quanto vuoi senza mai perdere qualità. Puoi anche modificare i colori, separare gli elementi, ridimensionare all'infinito.\n\n### Quando usare SVG\n- Per il tuo sito web (è il formato migliore per loghi responsive)\n- Per modificare il logo in futuro (cambiare colore, ridimensionare)\n- Per stampe professionali (dopo conversione in PDF ad alta risoluzione)\n- Per app e interfacce\n\n### Attenzione a:\n- Non tutti i programmi supportano SVG (ma sempre più lo fanno)\n- Alcuni social non accettano SVG (usa PNG per quelli)\n- Un SVG mal fatto può avere problemi di visualizzazione\n\n## Quale formato dovresti usare?\n\nLa risposta giusta è: entrambi, ma per scopi diversi.\n\n### Per il tuo canale Twitch/YouTube:\nUsa PNG per l'immagine del profilo, per le emotes, per i pannelli informativi. Usa SVG se hai un sito web o se vuoi fare animazioni con l'overlay.\n\n### Per i tuoi social:\nUsa sempre PNG. Instagram, Facebook, Twitter, Discord, tutti accettano PNG senza problemi.\n\n### Per la stampa:\nUsa SVG convertito in PDF o direttamente il file AI/EPS se il tuo designer te li ha forniti.\n\n### Per modifiche future:\nConserva sempre SVG e AI. Sono i file che ti permetteranno di apportare modifiche in futuro senza dover pagare un nuovo design.\n\n## Cosa controllare quando ricevi il logo\n\n- Il designer ti ha dato file vettoriali? (SVG, AI o EPS)\n- I file PNG sono in alta risoluzione? (minimo 1000x1000px)\n- Hai il logo in tutte le varianti? (colore, bianco, nero, orizzontale, quadrato)\n\nSe ti manca anche solo uno di questi, chiedili al tuo designer prima di saldare.\n\n## Conclusione\n\nUn logo vettoriale è un investimento che dura per sempre. Conserva i tuoi file SVG e AI come un tesoro, e usa i PNG per la vita di tutti i giorni. Se hai solo i PNG, prima o poi ti servirà un vettoriale e ti troverai a dover rifare tutto da capo.",
            'image' => null,
            'meta_title' => 'PNG vs SVG per creator | Guida ai formati logo',
            'meta_description' => 'Differenza tra PNG e SVG per il logo del tuo canale. Guida pratica per creator e streamer su quando usare ogni formato. Consigli e errori da evitare.',
            'published_at' => now()->subDay(),
            'active' => true,
        ]);

        Testimonial::create([
            'name' => 'Marco Rossi',
            'text' => 'Lavorare con StarLab è stata un\'esperienza fantastica. Ha capito subito la mia visione e ha creato un logo che rappresenta perfettamente il mio brand. Professionale, veloce e con un occhio per i dettagli che pochi hanno.',
            'rating' => 5,
            'active' => true,
            'sort_order' => 1,
        ]);

        Testimonial::create([
            'name' => 'Sofia Bianchi',
            'text' => 'Avevo bisogno di un\'identità visiva completa per la mia attività e il risultato ha superato le aspettative. Il pacchetto branding è stato curato nei minimi dettagli. Consigliatissimo!',
            'rating' => 5,
            'active' => true,
            'sort_order' => 2,
        ]);

        Testimonial::create([
            'name' => 'Luca Verdi',
            'text' => 'I template social che mi ha creato hanno rivoluzionato il mio feed Instagram. Ho ricevuto complimenti da clienti e colleghi. Professionista serio e creativo.',
            'rating' => 5,
            'active' => true,
            'sort_order' => 3,
        ]);
    }
}
