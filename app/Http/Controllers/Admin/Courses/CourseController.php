<?php

namespace App\Http\Controllers\Admin\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    //
    public function index()
    {
        $courses = Course::select([
            'id',
            'name',
            'duration',
            'description',
            'img',
            'created_at',
            'updated_at',
        ])
        ->paginate(12);
        return view('admin.courses.all-course', compact('courses'));
    }
    public function addcourse()
    {
        $course = new Course();
        return view('admin.courses.add-course', compact('course'));
    }
    public function store(CourseRequest $request)
    {
        if (!$request->hasFile('image')) {
            // Nếu không thì in ra thông báo
            return "Mời chọn file cần upload";
        }
        // Nếu có thì thục hiện lưu trữ file vào public/images
        $image = $request->file('image');
        $path = Storage::putFile('images', $image);
        try {
            DB::table('courses')->insert([
                'name' => $request->name,
                'duration' => $request->duration,
                'description' => $request->description,
                'img'=> $path,
            ]);
        } catch (\Throwable $t) {
            throw new ModelNotFoundException();
        }
        return redirect(route('course.allcourse'));
    }
    public function edit(Request $request, $id){
        $course = Course::find($id);
        if($course){
            return view('admin.courses.edit-course', compact('course'));
        }
        return redirect(route('course.allcourse'));
    }

    public function update(CourseRequest $request, $id){
        $course = Course::find($id);
        if (!$request->hasFile('image')) {
            // Nếu không thì in ra thông báo
            return "Mời chọn file cần upload";
        }
        // Nếu có thì thục hiện lưu trữ file vào public/images
        $image = $request->file('image');
        $path = $image->move('images', $image->hashName());
        if($course){
            $course->name = $request->input('name');
            $course->duration = $request->input('duration');
            $course->description = $request->input('description');
            $course->img = $path;
            $course->save();
            $msg = 'Update Courses is success!';
            return redirect(route('course.allcourse'))->with('msg', $msg);
        }
    }
    public function destroy(Request $request)
    {
        # code...
        $course_id = $request->input('course_id', 0);
        if($course_id){
            Course::destroy($course_id);
            return redirect(route('course.allcourse'))->with('msg', "Delete course {$course_id} success!");
        }else {
            throw new ModelNotFoundException();
        }
    }
}
