<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function test (Request $request)
    {
        return view('employee.teste');
    }
    
}