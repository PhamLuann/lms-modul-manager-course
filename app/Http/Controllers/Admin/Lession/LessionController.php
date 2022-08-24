<?php

namespace App\Http\Controllers\Admin\Lession;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class LessionController extends Controller
{
    //
    public function create(){
        $courses = Course::all();
        return view('admin.lessions.add-lession', compact('courses'));
    }
}
