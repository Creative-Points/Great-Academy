<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public $path = 'uploads/main-website/slider/';
    public function index()
    {
        $sliders = Slider::paginate();
        return view('admin.mainweb.slider.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'image'     =>  'required|image|mimes:png,jpg,gif,jpeg',
            'title'     =>  'required|string',
            'subtitle'  =>  'required|string',
            'linkto'    =>  'required|string',
            'btn_text'  =>  'required|string'
        ]);
        if($valid->fails())
        {
            return back()->withInput()->withErrors($valid);
        }else{
            if(!empty($request->image) && $request->hasFile('image'))
            {
                $file = $request->file('image');
                $name = Str::random(15).".";
                $ext  = $file->extension();
                $image = $name . $ext;
                $file->move($this->path, $image);
            }else{
                return back()->with('error', 'There is an error in this image');
            }
            Slider::insert([
                'title'     => $request->title,
                'subtitle'     => $request->subtitle,
                'link_to'     => $request->linkto,
                'btn_text'     => $request->btn_text,
                'image'     => $image,
            ]);
            return back()->with('success', 'Slider Added.');
        }
    }

    public function active(Slider $slider)
    {
        $slider->status = 1;
        $slider->update();
        return back()->with('success', 'Slider Activated.');
    }

    public function inactive(Slider $slider)
    {
        $slider->status = 2;
        $slider->update();
        return back()->with('success', 'Slider Inactivated.');
    }

    public function delete(Slider $slider)
    {
        // delete image
        $image = $slider->image;
        if(File::exists('uploads/main-website/slider/'.$image))
        {
            File::delete('uploads/main-website/slider/'.$image);
        }
        // delete news
        $slider->delete();
        return back()->with('success', 'Slider has been Deleted is Successfully.');
    }
}
