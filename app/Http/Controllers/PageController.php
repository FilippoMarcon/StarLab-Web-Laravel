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

    public function notFound()
    {
        return view('pages.not-found');
    }
}
