@extends('layout.app')
@section('tittle', 'Course')
@section('content')
    @include('layout.menu')
    @include('components.CoursePage.CourseTopBanner')
    @include('components.CoursePage.AllCourse')
    @include('layout.Footer')
@endsection
