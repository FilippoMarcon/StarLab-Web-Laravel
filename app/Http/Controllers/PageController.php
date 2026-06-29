<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Service;

class PageController extends Controller
{
    public function starweb()
    {
        return view('pages.starweb');
    }

    public function stargraphics()
    {
        return view('pages.stargraphics');
    }

    public function pricing()
    {
        return view('pages.pricing');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function notFound()
    {
        return view('pages.not-found');
    }

    public function sitemap()
    {
        $staticRoutes = [
            ['loc' => url('/'), 'priority' => '1.0'],
            ['loc' => route('servizi.index'), 'priority' => '0.9'],
            ['loc' => route('portfolio.index'), 'priority' => '0.9'],
            ['loc' => route('blog.index'), 'priority' => '0.8'],
            ['loc' => route('about'), 'priority' => '0.7'],
            ['loc' => route('contatti'), 'priority' => '0.7'],
            ['loc' => route('starweb'), 'priority' => '0.8'],
            ['loc' => route('stargraphics'), 'priority' => '0.8'],
            ['loc' => route('pricing'), 'priority' => '0.8'],
            ['loc' => route('terms'), 'priority' => '0.5'],
        ];

        $services = Service::where('active', true)->get()->map(fn($s) => [
            'loc' => route('servizi.show', $s->slug),
            'priority' => '0.8',
        ]);

        $projects = Project::all()->map(fn($p) => [
            'loc' => route('portfolio.show', $p->slug),
            'priority' => '0.7',
        ]);

        $posts = Post::where('active', true)->whereNotNull('published_at')->get()->map(fn($p) => [
            'loc' => route('blog.show', $p->slug),
            'priority' => '0.6',
        ]);

        $allRoutes = collect($staticRoutes)
            ->concat($services)
            ->concat($projects)
            ->concat($posts);

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($allRoutes as $r) {
            $xml .= '<url><loc>' . e($r['loc']) . '</loc><priority>' . $r['priority'] . '</priority></url>';
        }
        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
