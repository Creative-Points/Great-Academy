<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $users = User::whereHas("roles", function ($q){
            $q->where('name', 'admin');
        })->get();
        return view('admin.employee.index', compact('users'));
    }
}
