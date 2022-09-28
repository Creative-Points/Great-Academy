<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Material;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MaterialController extends Controller
{
    public $path = 'uploads/material/';

    public function index()
    {
        $materials = DB::table('materials')->join('course', 'course.id', '=', 'materials.course_id')
                            ->join('workshop', 'workshop.id', '=', 'materials.course_id')
                            // ->join('sections', function($join){
                            //     $join->on('sections.id', '=', 'course.section_id')
                            //     ->and('sections.id', '=', 'workshop.section_id');
                            // })
                            // ->query('INNER JOIN `sections` ON `sections`.`id` = `workshop`.`section_id` AND `sections`.`id = `course`.`section_id`')
                            ->join('sections as wSections', 'wSections.id', '=', 'workshop.section_id')
                            ->join('sections', 'sections.id', '=', 'course.section_id')
                            ->select('materials.*', 'course.name as cBelongTo', 'workshop.name as wBelongTo', 'sections.name as csection', 'wSections.name as wsection')
                            ->get();
        $courses = Course::all();
        $workshops = Workshop::all();
        return view('admin.material.index', compact('materials', 'courses', 'workshops'));
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'material'      =>  'required|file|mimes:pdf',
            // 'material'      =>  'required|file|mimes:xls,xlsx,ppt,pptx,docx,doc,pdf',
            'name'          =>  'required|string|min:4',
            'course'        =>  'required|numeric',
            'workshop'      =>  'required|numeric'
        ]);

        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{
            $slug = Str::slug($request->name);
            $count = Material::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
            $slug = $count ? "{$slug}-{$count}" : $slug;
            $slug = strtolower($slug);
            if(!empty($request->material) && $request->hasFile('material'))
            {
                $file = $request->file('material');
                $name = $slug . '.';
                $ext = $file->extension();
                $material = $name . $ext;
                $file->move($this->path, $material);
            }else{
                return back()->with('error', 'There is an error in this file');
            }
            if($request->workshop == 0)
            {
                $type = 'Course';
                $id = $request->course;
            }elseif($request->course == 0)
            {
                $type = 'Workshop';
                $id = $request->workshop;
            }

            Material::create([
                'name'      => $request->name,
                'course_id' => $id,
                'slug'      => $slug,
                'material'  => $material,
                'type'      => $type,
            ]);
            return back()->with('success', 'Material is uploaded.');
        }
    }

    public function display(Material $material)
    {
        $file = $this->path . $material->material;
        $ext = File::extension($file);
        if($ext == 'pdf')
        {
            $c_type = 'application/pdf';
        }elseif($ext == 'doc')
        {
            $c_type = 'application/msword';
        }elseif($ext == 'docx')
        {
            $c_type = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
        }elseif($ext == 'xls')
        {
            $c_type = 'application/vnd.ms-excel';
        }elseif($ext == 'xlsx')
        {
            $c_type = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
        }elseif($ext == 'ppt')
        {
            $c_type = 'application/vnd.ms-powerpoint';
        }elseif($ext == 'pptx')
        {
            $c_type = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';
        }
        return response()->file($file, [
            'Content-Type' => $c_type,
        ]);
    }

    public function active(Material $material)
    {
        $material->status = 1;
        $material->update();
        return back()->with('success', 'Material Activated.');
    }

    public function inactive(Material $material)
    {
        $material->status = 2;
        $material->update();
        return back()->with('success', 'Material Inactivated.');
    }

    public function delete(Material $material)
    {
        $file = $this->path . $material->material;
        if(File::exists($file))
        {
            File::delete($file);
        }
        $material->delete();
        return back()->with('success', 'Material deleted.');
    }
}
