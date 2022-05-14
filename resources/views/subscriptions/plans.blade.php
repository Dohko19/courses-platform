@extends('layouts.app')

@section('jumbotron')
    @include('layouts.partials.jumbotron', [
    "title" => __("Suscribete ahora a uno de nuestros planes"),
    "icon" => "globe"
])
@endsection
@section('content')
<div class="container">
    <div class="pricing-table pricing-three-column row">
        <div class="plan col-sm-4 col-lg-4">
            <div class="plan-name-bronze">
                <h2>{{ __("Plan Mensual") }}</h2>
                <span>{{ __(":price / Mes", ['price' => '$ 9.99']) }}</span>
            </div>
            <ul>
                <li class="plan-feature">{{ ("Acceso a todos los cursos") }}</li>
                <li class="plan-feature">{{ ("Acceso a todos los archivos") }}</li>
                <li class="plan-feature">
                    @include("layouts.partials.stripe.form", [
                            "product" => [
                                "name" => __("Subscription"),
                                "description" => __("Mensual"),
                                "type" => __("monthly"),
                                "amount" => 999,99
                            ]
                        ])
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
@endpush
