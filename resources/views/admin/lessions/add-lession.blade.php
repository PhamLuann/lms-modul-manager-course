@extends('admin.layouts.app')
@section('title', 'Add Lession')

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15 " style="min-height: 500px;">
    <div class="container-fluid">
        <form action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row col-lg-8 col-md-8 col-sm-8 col-xs-12" style="margin-left: 15%;">
                <div class="mb-3">
                    <label for="course_id" class="form-label">Select the Course</label>
                    <select id="course_id" name="course_id" class="form-select @error('course_id') is-invalid @enderror">
                        <option value="">-</option>
                        @forelse($courses as $course)
                        @if ($course->id == old('course_id'))
                        <option selected="selected" value="{{ $course->name }}">{{ $course->name }}</option>
                        @else
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endif
                        @empty
                        @endforelse
                    </select>
                    @error('course_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Lession Name" value="{{ old('name')}}">
                    @error('name')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input name="chapter" type="number" class="form-control @error('chapter') is-invalid @enderror" placeholder="Chapter (Number)" value="{{ old('chapter')}}">
                    @error('chapter')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group @error('description') is-invalid @enderror">
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" style="height: 100px;" placeholder="Description" value="{{ old('description')}}"></input>
                    @error('description')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
                <!-- file -->
                <div class="mb-3" style="margin-bottom: 20px;">
                    <p>File</p>
                    <input type="file" name="image" class="form-control"></input>
                </div>
                <div class="form-group">
                    <input name="video" type="text" class="form-control @error('video') is-invalid @enderror" placeholder="Video url" value="{{ old('video')}}">
                    @error('video')
                    <div class="invalid-feedback" style="color: red;"> * {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div style="text-align: center;">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop