<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Section;
use App\Models\Workshop;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $string = '';
        $filter = FALSE;
        if(isset($request->search))
        {
            $string = $request->search;
            // advanced search like [ STATUS:active, FACULTY:mis ]
            if($string)
            {
                $str = explode(':', $string);
                if(count($str) > 1)
                {
                    $filter = TRUE;
                    // search by filter
                    switch ($str[0])
                    {
                        case 'STATUS':
                            if($str[1] == 'active')
                            {
                                $string = 1;
                            }elseif($str[1] == 'inactive')
                            {
                                $string = 2;
                            }
                            break;
                        case 'LEVEL':
                            $string = $str[1];
                            break;
                        case 'PRICE':
                            $string = $str[1];
                            break;
                        case 'HOURS':
                            $string = $str[1];
                            break;
                        default:
                            return back()->with('error', 'This key: ('.$str[0].') Is not found in search system.');
                    }
                }
            }
            // Query of search in DB
            $workshops = DB::table('workshop')
                ->select('workshop.*', 'sections.name as section_name')
                ->join('sections', 'workshop.section_id', '=', 'sections.id')
                ->where(function($query) use ($string, $filter, $str){
                    $cols = ['workshop.name', 'price', 'level', 'workshop.status', 'hours'];
                    foreach($cols as $col)
                    {
                        if(intval($string) && strlen($string) == 1 && $str[0] == 'STATUS')
                        {
                            $query->orWhere('workshop.status', '=', $string);
                        }elseif($filter == TRUE){
                            $query->orWhere($str[0], '=', $string);
                        }else{
                            $query->orWhere($col, 'like', '%' . $string . '%');
                        }
                    }
                })
                ->paginate();
            $string = $request->search;
        }else{
            $workshops = DB::table('workshop')
                    ->select('workshop.*', 'sections.name as section_name')
                    ->join('sections', 'workshop.section_id', '=', 'sections.id')
                    ->paginate();
        }
        $sections  = Section::all();
        return view('admin.workshop.index', compact('workshops', 'sections', 'string'));
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:png,jpg,jpeg,gif|max:3048',
            'name'      => 'required|string|min:8|',
            'desc'      => 'required|string',
            'level'     => 'required|numeric',
            'hours'     => 'required|numeric',
            'price'     => 'required|numeric',
            'section'   => 'required|numeric|exists:sections,id',
        ]);

        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{
            if(!empty($request->image) && $request->hasFile('image'))
            {
                $path = 'uploads/workshop/';
                $file = $request->file('image');
                $name = Str::random(16) . '.';
                $ext  = $file->extension();
                $image = $name . $ext;
                $file->move($path, $image);
            }else{
                return back()->with('error', 'There is an error in this image');
            }

            $slug = Str::slug($request->name);
            $count = Workshop::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $slug = $count ? "{$slug}-{$count}" : $slug;
            $slug = strtolower($slug);
            Workshop::create([
                'image'         => $image,
                'name'          => $request->name,
                'description'   => $request->desc,
                'price'         => $request->price,
                'level'         => $request->level,
                'slug'          => $slug,
                'hours'         => $request->hours,
                'section_id'    => $request->section,
            ]);

            $section = Section::find($request->section);
            $section->workshops += 1;
            $section->update();

            return back()->with('success', 'Workshop has been added successfully.');
        }
    }

    public function update(Request $request, $slug)
    {
        $valid = Validator::make($request->all(), [
            // 'image'     => 'image|mimes:png,jpg,jpeg,gif|max:3048',
            'name'      => 'required|string|min:8|',
            'desc'      => 'required|string',
            'level'     => 'required|numeric',
            'hours'     => 'required|numeric',
            'price'     => 'required|numeric',
            'section'   => 'required|numeric|exists:sections,id',
            'status'    => 'required|numeric',
        ]);

        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{
            // get old image
            $workshop = Workshop::where('slug', '=', $slug)->first();
            // $image = $course->image;
            // if(!empty($request->image) && $request->hasFile('image'))
            // {
            //     $path = 'uploads/course/';
            //     if(File::exists($path.$image))
            //     {
            //         File::delete($path.$image);
            //     }
            //     $file = $request->file('image');
            //     $name = Str::random(16) . '.';
            //     $ext = $file->extension();
            //     $image = $name . $ext;
            //     $file->move($path, $image);
            // }else{
            //     return back()->with('error', 'There is an error in this image');
            // }

            // change slug
            $slug = $workshop->slug;
            if($workshop->name != $request->name)
            {
                $slug = Str::slug($request->name);
                $count = Workshop::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
                $slug = $count ? "{$slug}-{$count}" : $slug;
                $slug = strtolower($slug);
            }
            

            // change section
            if($workshop->section_id != $request->section)
            {
                $section = Section::find($workshop->section_id);
                $section->workshops -= 1;
                $section->update();

                $section = Section::find($request->section);
                $section->workshops += 1;
                $section->update();
            }

            // update here
            $workshop->name       = $request->name;
            $workshop->description= $request->desc;
            $workshop->price      = $request->price;
            $workshop->level      = $request->level;
            $workshop->slug       = $slug;
            $workshop->hours      = $request->hours;
            $workshop->section_id = $request->section;
            $workshop->status     = $request->status;
            $workshop->update();

            return redirect(route('dashboard.workshop.view', $slug))->with('success', 'Workshop has been updated successfully.');
            // return redirect()->route()->
        }
    }

    public function image(Request $request, $slug)
    {
        $valid = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:png,jpg,jpeg,gif|max:3048',
        ]);

        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{
            $workshop = Workshop::where('slug', '=', $slug)->first();
            $image = $workshop->image;
            if(!empty($request->image) && $request->hasFile('image'))
            {
                $path = 'uploads/workshop/';
                if(File::exists($path.$image))
                {
                    File::delete($path.$image);
                }
                $file = $request->file('image');
                $name = Str::random(16) . '.';
                $ext = $file->extension();
                $image = $name . $ext;
                $file->move($path, $image);
            }else{
                return back()->with('error', 'There is an error in this image');
            }
            $workshop->image = $image;
            $workshop->update();

            return back()->with('success', 'Workshop image has been updated successfully.');
        }
    }

    public function show($slug)
    {
        $workshop = DB::table('workshop')
                    ->select('workshop.*', 'sections.name as section_name')
                    ->join('sections', 'workshop.section_id', '=', 'sections.id')
                    ->where('workshop.slug', '=', $slug)
                    ->first();
        $materials = DB::table('materials')
                    ->where('course_id', '=', $workshop->id)
                    ->where('type', '=', 'Workshop')
                    ->get();
        $sections = Section::all();
        return view('admin.workshop.view', compact('workshop', 'sections', 'materials'));
    }

    public function inactive($slug)
    {
        $workshop = Workshop::where('slug', $slug)->first();
        $workshop->status = 2;
        $workshop->update();

        return back()->with('success', 'Workshop has been Inactivated is Successfully.');
    }

    public function active($slug)
    {
        $workshop = Workshop::where('slug', $slug)->first();
        $workshop->status = 1;
        $workshop->update();

        return back()->with('success', 'Workshop has been Activated is Successfully.');
    }

    public function delete($slug)
    {
        $workshop = Workshop::where('slug', $slug)->first();
        // delete image
        $image = $workshop->image;
        if(File::exists('uploads/workshop/'.$image))
        {
            File::delete('uploads/workshop/'.$image);
        }
        // update section count
        $section = Section::find($workshop->section_id);
        $section->workshops -= 1;
        $section->update();
        // delete workshop
        $workshop->delete();

        return back()->with('success', 'Workshop has been Deleted is Successfully.');
    }
}
