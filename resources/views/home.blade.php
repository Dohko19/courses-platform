@extends('layouts.app')

@section('jumbotron')
    @include("layouts.partials.jumbotron", [
        'title' => __('Accede a cualquier curso de inmediato'),
        'icon' => 'th'
    ])
@endsection
@section('content')
<div class="pr-5 pl-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            @forelse($courses as $course)
                <div class="col-md-3">
                    @include('layouts.partials.courses.card_courses')
                </div>
            @empty
                <div class="alert alert-dark">
                    {{ __("No hay ningun curso disponible") }}
                </div>
            @endforelse
        </div>
    </div>
    <div class="container-fluid">
        <div class="d-flex text-center justify-content-center">
            {{ $courses->links() }}
        </div>
    </div>
</div>
@endsection
