@extends('admin.layouts.app')
@section('title', 'All Courses')

@section('search')
<!-- Single pro tab review Start-->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
<div class="courses-area container-fluid" style="min-height: 530px;">
    @forelse($courses as $course)
    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="c-card border border-dark rounded-circle">
            <div class="text-center" style="margin-bottom: 10px;">
                <img src="{{ asset($course->img) }}" alt="course-img" class="image-course">
            </div>
            <div class="courses-tit">
                <h2 class="text-capitalize fw-bold text-center">{{$course->name}}</h2>
            </div>
            <div class="course-des">
                <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> {{$course->duration}} Months</p>
                <p><span><i class="fa fa-clock"></i></span> <b>Description:</b> {{$course->description}}</p>
            </div>
            <div class="">
                <button type="button" class="btn btn-success">Detail</button>
                <a href="{{ route('course.editcourse', [$course->id]) }}" type="button" class="btn btn-warning">Edit</a>
                <form method="post" action="{{ route('course.delete') }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <h2 class="text-danger">No Courses</h2>
    @endforelse
    <div style="position: absolute; bottom: 0%;">
        {{ $courses->links() }}
    </div>
</div>
@stop