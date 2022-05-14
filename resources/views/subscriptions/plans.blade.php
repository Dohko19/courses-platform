@extends('layouts.app')

@section('jumbotron')
    @include('layouts.partials.jumbotron', [
    "title" => __("Suscribete ahora a uno de nuestros planes"),
    "icon" => "globe"
])
@endsection
@section('content')

@endsection
