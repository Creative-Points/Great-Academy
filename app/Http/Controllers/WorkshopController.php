<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Workshop;
use Illuminate\Support\Facades\DB;

class WorkshopController extends Controller
{
    public function index()
    {
        $sections = Section::where('status', 1)->orderBy('name', 'asc')->get();
        $workshops = DB::table('workshop')
                    ->select('workshop.*', 'sections.name as sec')
                    ->join('sections', 'sections.id', '=', 'workshop.section_id')
                    ->where('sections.status', '=', 1)
                    ->where('workshop.status', '=', 1)
                    ->get();
        return view('workshops', compact('sections', 'workshops'));
    }

    public function workshop(Workshop $workshop)
    {
        return view('workshop', compact('workshop'));
    }
}
