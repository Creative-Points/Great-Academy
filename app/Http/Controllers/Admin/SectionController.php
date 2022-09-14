<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            if(!empty($request->image) && $request->hasFile('image'))
            {
                $path = 'uploads/section/';
                $file = $request->file('image');
                $name = $request->name.".";
                $ext  = $file->extension();
                $image = $name . $ext;
                $file->move($path, $image);
                // if(!$file->move($path, $image))
                // {
                //     return back()->with('error', 'This image is not Uploaded');
                // }
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
}
