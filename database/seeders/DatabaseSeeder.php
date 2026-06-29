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
            'title' => 'Quanto costa un logo nel 2026? Guida completa ai prezzi',
            'slug' => 'quanto-costa-un-logo-2026',
            'content' => "Se ti stai chiedendo quanto costa un logo professionale nel 2026, sei nel posto giusto.\n\nIl prezzo di un logo può variare da 0€ (se lo fai da solo con Canva) a migliaia di euro se ti affidi a uno studio di branding.\n\n## Logo fai-da-te (0-50€)\n\nUsando strumenti come Canva o Hatchful puoi creare un logo gratis o a basso costo. Il problema? Il risultato è spesso generico, poco originale e difficile da scalare.\n\n## Freelance / Graphic Designer (50-500€)\n\nLa fascia media è quella dei freelance. Con 80-200€ puoi ottenere un logo professionale realizzato su misura, con revisioni incluse e file pronti all'uso.\n\n## Studio di branding (500€+) \n\nPer un branding completo con strategia, ricerche di mercato e linee guida dettagliate, i prezzi partono da 500€ e possono arrivare a diverse migliaia di euro.\n\n## Quanto dovresti spendere?\n\nPer un piccolo business o un creator, 100-300€ per un logo professionale è un investimento ragionevole. Per un brand che vuole essere preso sul serio, considera almeno 200-400€ per un pacchetto completo.\n\nIl segreto? Non cercare il prezzo più basso. Cerca il designer che capisce la tua visione.",
            'image' => null,
            'meta_title' => 'Quanto costa un logo nel 2026? | Guida Prezzi',
            'meta_description' => 'Scopri quanto costa un logo professionale nel 2026. Prezzi medi per freelance, agenzie e tool fai-da-te. Guida completa per scegliere il giusto investimento per il tuo brand.',
            'published_at' => now(),
            'active' => true,
        ]);

        Post::create([
            'title' => 'Come creare un\'identità di brand forte: 5 passi essenziali',
            'slug' => 'come-creare-identita-brand',
            'content' => "Creare un'identità di brand forte è fondamentale per distinguersi in un mercato sempre più competitivo.\n\nEcco i 5 passi per costruire un brand memorabile.\n\n## 1. Definisci la tua missione\n\nPrima di tutto, chiediti: perché esiste il tuo brand? Cosa lo rende unico? La missione è il fondamento su cui costruirai tutto il resto.\n\n## 2. Conosci il tuo pubblico\n\nUn brand forte parla direttamente al suo target. Definisci chi sono i tuoi clienti ideali, cosa cercano e come il tuo brand può risolvere i loro problemi.\n\n## 3. Crea un visual coerente\n\nLogo, colori, tipografia e immagini devono comunicare la stessa personalità in ogni punto di contatto. La coerenza crea fiducia.\n\n## 4. Sviluppa una voce unica\n\nIl tono di voce del tuo brand deve riflettere la sua personalità. Che tu sia professionale, giocoso o ispirazionale, mantieni lo stesso tono su tutti i canali.\n\n## 5. Applica con costanza\n\nUn brand forte si costruisce nel tempo. Applica le tue linee guida in modo coerente su ogni touchpoint: sito, social, packaging, email.",
            'image' => null,
            'meta_title' => 'Come creare un\'identità di brand forte | StarLab',
            'meta_description' => 'Scopri i 5 passi essenziali per costruire un\'identità di brand forte e memorabile. Guida pratica per creator e piccole imprese.',
            'published_at' => now(),
            'active' => true,
        ]);

        Post::create([
            'title' => 'PNG vs SVG: quale formato scegliere per il tuo logo?',
            'slug' => 'png-vs-svg-formato-logo',
            'content' => "Quando ricevi il tuo logo, ti vengono consegnati diversi formati. I due più comuni sono PNG e SVG. Qual è la differenza?\n\n## PNG (Portable Network Graphics)\n\nIl PNG è un formato raster, basato su pixel. È ideale per:\n- Utilizzo sul web\n- Social media\n- Documenti Office\n- Email\n\nIl PNG supporta la trasparenza ed è universalmente supportato. L'unico svantaggio? Se lo ingrandisci troppo, perde qualità.\n\n## SVG (Scalable Vector Graphics)\n\nL'SVG è un formato vettoriale, basato su equazioni matematiche. È ideale per:\n- Stampa (se convertito correttamente)\n- Siti web moderni (scalabile all'infinito)\n- App e interfacce\n- Modifiche future\n\nL'SVG può essere ridimensionato a qualsiasi dimensione senza perdere qualità. Perfetto per design responsivi.\n\n## Quale scegliere?\n\nPer il tuo logo, dovresti avere ENTRAMBI i formati:\n- Usa PNG per social, sito web e documenti\n- Conserva SVG per future modifiche e utilizzi professionali\n\nSe il tuo designer ti consegna solo PNG, chiedi anche il vettoriale (SVG, AI o EPS). \n\nUn logo vettoriale è un investimento che dura per sempre.",
            'image' => null,
            'meta_title' => 'PNG vs SVG: quale formato scegliere per il logo?',
            'meta_description' => 'Differenza tra PNG e SVG per il tuo logo. Scopri quale formato usare per il web, la stampa e i social. Guida completa ai formati file.',
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
