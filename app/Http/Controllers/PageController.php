<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function starweb()
    {
        return view('pages.starweb');
    }

    public function stargraphics()
    {
        return view('pages.stargraphics');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function news()
    {
        return view('pages.news');
    }

    public function company()
    {
        return view('pages.company');
    }

    public function pricing()
    {
        return view('pages.pricing');
    }

    public function serviceDetail($id)
    {
        return view('pages.service-detail', compact('id'));
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
        $routes = [
            ['loc' => url('/'), 'priority' => '1.0'],
            ['loc' => route('portfolio'), 'priority' => '0.9'],
            ['loc' => route('starweb'), 'priority' => '0.8'],
            ['loc' => route('stargraphics'), 'priority' => '0.8'],
            ['loc' => route('contact'), 'priority' => '0.7'],
            ['loc' => route('news'), 'priority' => '0.7'],
            ['loc' => route('company'), 'priority' => '0.7'],
            ['loc' => route('pricing'), 'priority' => '0.8'],
            ['loc' => route('terms'), 'priority' => '0.5'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($routes as $r) {
            $xml .= '<url><loc>' . e($r['loc']) . '</loc><priority>' . $r['priority'] . '</priority></url>';
        }
        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
