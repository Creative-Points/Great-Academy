<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class StudentController extends Controller
{
    public $path = 'uploads/material/';
    public function index()
    {
        return view('student.index');
    }

    public function settings()
    {
        return view('student.settings');
    }

    public function password()
    {
        return view('student.password');
    }

    public function myCourses()
    {
        $id = auth()->user()->id;
        // $courses = DB::table('orders')
        //                 ->select('orders.*', 'course.*')
        //                 ->where('orders.')
        $courses = DB::table('orders')
                    ->where('orders.student_id', '=', $id)
                    ->select('orders.*', 'orders.code as ocode', 'course.*', 'sections.name as section_name', 'sections.slug as sslug')
                    ->join('course', 'course.id', '=', 'orders.course_id')
                    ->join('sections', 'sections.id', '=', 'course.section_id')
                    ->paginate();
        return view('student.courses', compact('courses'));
    }

    public function myCourse(Course $course)
    {
        $materials = DB::table('materials')
            ->where('course_id', '=', $course->id)
            ->where('type', '=', 'Course')
            ->get();
        return view('student.course', compact('materials'));
    }

    public function myWorkshops()
    {
        $id = auth()->user()->id;
        // $courses = DB::table('orders')
        //                 ->select('orders.*', 'course.*')
        //                 ->where('orders.')
        $workshops = DB::table('orders')
                    ->where('orders.student_id', '=', $id)
                    ->select('orders.*', 'orders.code as ocode', 'workshop.*', 'sections.name as section_name', 'sections.slug as sslug')
                    ->join('workshop', 'workshop.id', '=', 'orders.workshop_id')
                    ->join('sections', 'sections.id', '=', 'workshop.section_id')
                    ->paginate();
        return view('student.workshops', compact('workshops'));
    }

    public function viewMate(Material $material)
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

}
