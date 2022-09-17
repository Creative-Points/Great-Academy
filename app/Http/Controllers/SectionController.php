<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::where('status', 1)->get();
        return view('sections', compact('sections'));
    }

    public function section($slug, $type = 'courses')
    {
        $section = Section::where('slug', $slug)->first();
        $name = $section->name;
        $sections = Section::where('status', 1)->orderBy('name', 'asc')->get();
        if($type == 'courses')
        {
            $items = DB::table('course')
                        ->select('course.*', 'sections.name as sec')
                        ->join('sections', 'sections.id', '=', 'course.section_id')
                        ->where('sections.slug', '=', $slug)
                        ->where('sections.status', '=', '1')
                        ->where('course.status', '=', '1')
                        ->get();
        }elseif($type == 'workshops')
        {
            $items = DB::table('workshop')
                        ->select('workshop.*', 'sections.name as sec')
                        ->join('sections', 'sections.id', '=', 'workshop.section_id')
                        ->where('sections.slug', '=', $slug)
                        ->where('sections.status', '=', '1')
                        ->where('workshop.status', '=', '1')
                        ->get();
        }else{
            return redirect()->route('home');
        }
        $path = $type == 'courses' ? 'course' : 'workshop';
        return view('section', compact('items', 'sections', 'name', 'path', 'slug'));
    }
}
