@extends('layout.app')
@section('tittle', 'Prroject')
@section('content')
    @include('layout.menu')
      @include('components.ProjectPage.TopBanner')
    @include('components.ProjectPage.AllProject')
    @include('layout.Footer')
@endsection
