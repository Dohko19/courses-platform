@extends('layouts.app')

@section('jumbotron')
    @include('layouts.partials.jumbotron', [
    "title" => __("Suscribete ahora a uno de nuestros planes"),
    "icon" => "globe"
])
@endsection
@section('content')
    <div class="ps-5 pe-5">
        <div class="row justify-content-around">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Plan</th>
                        <th scope="col">ID Suscripcion</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Alta</th>
                        <th scope="col">Finaliza en</th>
                        <th scope="col">Cancelar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscriptions as $sub)
                        <td>{{ $sub->id }}</td>
                        <td>{{ $sub->name }}</td>
                        <td>{{ $sub->stripe_plan }}</td>
                        <td>{{ $sub->stripe_id }}</td>
                        <td>{{ $sub->quantity }}</td>
                        <td>{{ $sub->created_at->format('d/m/Y') }}</td>
                        <td>{{ $sub->ends_at ? $sub->ends_at->format('d/m/Y') : __("Subscripcion activa") }}</td>
                        <td>
                            @if($sub->ends_at)
                                <form action="{{ route('subscriptions.resume') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="{{ $sub->name }}">
                                    <button class="btn btn-success">
                                        {{ __("Reanudar") }}
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('subscriptions.cancel') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan" value="{{ $sub->name }}">
                                    <button class="btn btn-danger">
                                        {{ __("Cancelar") }}
                                    </button>
                                </form>
                            @endif
                        </td>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">{{ __("No hay ninguna subscripcion disponible") }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
@endpush
