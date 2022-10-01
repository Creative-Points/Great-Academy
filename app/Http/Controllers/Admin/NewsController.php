<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate();
        return view('admin.mainweb.news.index', compact('news'));
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'text'      => 'required|string'
        ]);
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{
            DB::table('news')->insert([
                'text'  => $request->text,
            ]);
            return back()->with('success', 'News Added Successfully.');
        }
    }

    public function active(News $news)
    {
        $news->status = 1;
        $news->update();
        return back()->with('success', 'News Activated.');
    }

    public function inactive(News $news)
    {
        $news->status = 2;
        $news->update();
        return back()->with('success', 'News Inactivated.');
    }

    public function delete(News $news)
    {
        // delete news
        $news->delete();
        return back()->with('success', 'News has been Deleted is Successfully.');
    }
}
