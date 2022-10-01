<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $news = News::where('status', 1)->get();
        return view('index', compact('news'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact-us');
    }
}
