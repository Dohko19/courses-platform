@extends('layouts.app')

@section('jumbotron')
    @include('layouts.partials.courses.jumbotron')
@endsection
@section('content')
    <div class="ps-5 pe-5">
        <div class="row justify-content-center">
            @include("layouts.partials.courses.goals", ["goals" => $course->goals])
            @include("layouts.partials.courses.requirements", ["requirements" => $course->requirements])
            @include('layouts.partials.courses.description')
            @include('layouts.partials.courses.related')
        </div>
    </div>
@endsection
