@extends('layouts.app')

@section('content')
<div class="pl-5 pr-5">
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
    <div class="row justify-content-center">
        {{ $courses->links() }}
    </div>
</div>
@endsection
