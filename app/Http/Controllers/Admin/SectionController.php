<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Course;
use App\Models\Workshop;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return view('admin.section.index', compact('sections'));
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(),
            [
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:3048',
                'name'      => 'required|string|unique:sections,name',
            ]
        );
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{
            $slug = Str::slug($request->name);
            $count = Section::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $slug = $count ? "{$slug}-{$count}" : $slug;
            $slug = strtolower($slug);
            if(!empty($request->image) && $request->hasFile('image'))
            {
                $path = 'uploads/section/';
                $file = $request->file('image');
                $name = $slug.".";
                $ext  = $file->extension();
                $image = $name . $ext;
                $file->move($path, $image);
            }else{
                return back()->with('error', 'There is an error in this image');
            }
            Section::create([
                'name'      => $request->name,
                'image'     => $image,
            ]);
            return back()->with('success', 'Section has been added successfully.');
        }
    }

    public function update(Request $request, $slug)
    {
        $section = Section::where('slug', $slug)->first();
        // var_dump($section);
        // $id = $section->id;
        $valid = Validator::make($request->all(), [
            'name'      => 'required|string|min:8|unique:sections,name,'.$slug .',slug',
            'status'    => 'required|numeric',
        ]);

        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{

            // change slug
            $slug = $section->slug;
            if($section->name != $request->name)
            {
                $slug = Str::slug($request->name);
                $count = Section::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
                $slug = $count ? "{$slug}-{$count}" : $slug;
                $slug = strtolower($slug);
            }

            // update here
            $section->name       = $request->name;
            $section->slug       = $slug;
            $section->status     = $request->status;
            $section->update();

            return redirect(route('dashboard.section.view', $slug))->with('success', 'Section has been updated successfully.');
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
            $section = Section::where('slug', '=', $slug)->first();
            $image = $section->image;
            if(!empty($request->image) && $request->hasFile('image'))
            {
                $path = 'uploads/section/';
                if(File::exists($path.$image))
                {
                    File::delete($path.$image);
                }
                $file = $request->file('image');
                $name = $slug . '.';
                $ext = $file->extension();
                $image = $name . $ext;
                $file->move($path, $image);
            }else{
                return back()->with('error', 'There is an error in this image');
            }
            $section->image = $image;
            $section->update();

            return back()->with('success', 'Section image has been updated successfully.');
        }
    }

    public function show($slug)
    {
        $section = Section::where('sections.slug', '=', $slug)->first();
        $courses = Course::where('section_id', $section->id)->get();
        $workshops = Workshop::where('section_id', $section->id)->get();
        return view('admin.section.view', compact('section', 'courses', 'workshops'));
    }

    public function inactive($slug)
    {
        $section = Section::where('slug', $slug)->first();
        $section->status = 2;
        $section->update();

        return back()->with('success', 'Section has been Inactivated is Successfully.');
    }

    public function active($slug)
    {
        $section = Section::where('slug', $slug)->first();
        $section->status = 1;
        $section->update();

        return back()->with('success', 'Section has been Activated is Successfully.');
    }

    public function delete($slug)
    {
        $section = Section::where('slug', $slug)->first();
        if($section->count > 0)
        {
            return back()->with('error', 'Can not delete this Section (' . $section->name . ').');
        }else{
            // delete image
            $image = $section->image;
            if(File::exists('uploads/section/'.$image))
            {
                File::delete('uploads/section/'.$image);
            }
            // delete course
            $section->delete();
            return back()->with('success', 'Section has been Deleted is Successfully.');
        }
    }
}
