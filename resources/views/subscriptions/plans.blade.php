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
        <div class="plan col-sm-4 col-lg-4">
            <div class="plan-name-silver">
                <h2>{{ __("Plan Trimestral") }}</h2>
                <span>{{ __(":price / 3 Mess", ['price' => '$ 19.99']) }}</span>
            </div>
            <ul>
                <li class="plan-feature">{{ ("Acceso a todos los cursos") }}</li>
                <li class="plan-feature">{{ ("Acceso a todos los archivos") }}</li>
                <li class="plan-feature">
                    @include("layouts.partials.stripe.form", [
                            "product" => [
                                "name" => __("Subscription"),
                                "description" => __("Trimestral"),
                                "type" => __("quarterly"),
                                "amount" => 1999,99
                            ]
                        ])
                </li>
            </ul>
        </div>
        <div class="plan col-sm-4 col-lg-4">
            <div class="plan-name-gold">
                <h2>{{ __("Plan Anual") }}</h2>
                <span>{{ __(":price / 1 año", ['price' => '$ 89.99']) }}</span>
            </div>
            <ul>
                <li class="plan-feature">{{ ("Acceso a todos los cursos") }}</li>
                <li class="plan-feature">{{ ("Acceso a todos los archivos") }}</li>
                <li class="plan-feature">
                    @include("layouts.partials.stripe.form", [
                            "product" => [
                                "name" => __("Subscription"),
                                "description" => __("Anual"),
                                "type" => __("yearly"),
                                "amount" => 8999,99
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
