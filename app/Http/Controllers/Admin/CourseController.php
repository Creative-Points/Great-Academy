<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = DB::table('course')
                    ->select('course.*', 'sections.name as section_name')
                    ->join('sections', 'course.section_id', '=', 'sections.id')
                    ->paginate();
        $sections  = Section::all();
        return view('admin.course.index', compact('courses', 'sections'));
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
                $path = 'uploads/course/';
                $file = $request->file('image');
                $name = Str::random(16) . '.';
                $ext  = $file->extension();
                $image = $name . $ext;
                $file->move($path, $image);
            }else{
                return back()->with('error', 'There is an error in this image');
            }

            $slug = Str::slug($request->name);
            $count = Course::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $slug = $count ? "{$slug}-{$count}" : $slug;
            $slug = strtolower($slug);
            Course::create([
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
            $section->count += 1;
            $section->update();

            return back()->with('success', 'Course has been added successfully.');
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
            $course = Course::where('slug', '=', $slug)->first();
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
            $slug = $course->slug;
            if($course->name != $request->name)
            {
                $slug = Str::slug($request->name);
                $count = Course::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
                $slug = $count ? "{$slug}-{$count}" : $slug;
                $slug = strtolower($slug);
            }
            

            // change section
            if($course->section_id != $request->section)
            {
                $section = Section::find($course->section_id);
                $section->count -= 1;
                $section->update();

                $section = Section::find($request->section);
                $section->count += 1;
                $section->update();
            }

            // update here
            // $course->image      = $image;
            $course->name       = $request->name;
            $course->description= $request->desc;
            $course->price      = $request->price;
            $course->level      = $request->level;
            $course->slug       = $slug;
            $course->hours      = $request->hours;
            $course->section_id = $request->section;
            $course->status     = $request->status;
            $course->update();

            return redirect(route('dashboard.course.view', $slug))->with('success', 'Course has been updated successfully.');
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
            $course = Course::where('slug', '=', $slug)->first();
            $image = $course->image;
            if(!empty($request->image) && $request->hasFile('image'))
            {
                $path = 'uploads/course/';
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
            $course->image = $image;
            $course->update();

            return back()->with('success', 'Course image has been updated successfully.');
        }
    }

    public function show(Course $course)
    {
        $course = DB::table('course')
                    ->select('course.*', 'sections.name as section_name')
                    ->join('sections', 'course.section_id', '=', 'sections.id')
                    ->where('course.slug', '=', $course->slug)
                    ->first();
        $sections = Section::all();
        return view('admin.course.view', compact('course', 'sections'));
    }

    public function inactive($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $course->status = 2;
        $course->update();

        return back()->with('success', 'Course has been Inactivated is Successfully.');
    }

    public function active($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $course->status = 1;
        $course->update();

        return back()->with('success', 'Course has been Activated is Successfully.');
    }

    public function delete($slug)
    {
        $course = Course::where('slug', $slug)->first();
        // delete image
        $image = $course->image;
        if(File::exists('uploads/course/'.$image))
        {
            File::delete('uploads/course/'.$image);
        }
        // update section count
        $section = Section::find($course->section_id);
        $section->count -= 1;
        $section->update();
        // delete course
        $course->delete();

        return back()->with('success', 'Course has been Deleted is Successfully.');
    }
}
