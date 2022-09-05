<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        $users = User::whereHas("roles", function ($q){
            $q->where('name', 'instructor');
        })->get();
        return view('admin.instructor.index', compact('users'));
    }
}
