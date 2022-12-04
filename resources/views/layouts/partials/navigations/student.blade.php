<li><a href="#" class="nav-link">{{ __('Mi perfil') }}</a></li>
<li><a href="{{ route('subscription.admin') }}" class="nav-link">{{ __('Mi suscripciones') }}</a></li>
<li><a href="{{ route('invoices.admin') }}" class="nav-link">{{ __('Mi facturas') }}</a></li>
<li><a href="#" class="nav-link">{{ __('Mi cursos') }}</a></li>
@include('layouts.partials.navigations.logged')
