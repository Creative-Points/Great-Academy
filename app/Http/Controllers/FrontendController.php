<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $sliders = Slider::where('status', 1)->get();
        $news = News::where('status', 1)->get();
        return view('index', compact('sliders', 'news'));
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
