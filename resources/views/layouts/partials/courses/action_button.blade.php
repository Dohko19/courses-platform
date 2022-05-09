<div class="col-2">
    @auth
        @can('opt_for_course', $course)
            @can('subscribe', \App\Models\Course::class)
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-subscribe btn-">
                        <i class="fa fa-bolt"> {{ __("Subscribirme y acceder") }}</i>
                    </a>
                </div>
            @else
                @can('inscribe', $course)
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-subscribe btn-">
                            <i class="fa fa-bolt"> {{ __("Inscribirme") }}</i>
                        </a>
                    </div>
                @else
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-subscribe btn-">
                            <i class="fa fa-bolt"> {{ __("Inscrito") }}</i>
                        </a>
                    </div>
                @endcan
            @endcan
        @else
            <div class="d-grid gap-2">
                <a href="#" class="btn btn-subscribe btn-">
                    <i class="fa fa-user"> {{ __("Soy autor") }}</i>
                </a>
            </div>
        @endcan
    @else
        <div class="d-grid gap-2">
            <a href="{{ route('login') }}" class="btn btn-subscribe btn-">
                <i class="fa fa-user"> {{ __("Acceder") }}</i>
            </a>
        </div>
    @endauth
</div>
