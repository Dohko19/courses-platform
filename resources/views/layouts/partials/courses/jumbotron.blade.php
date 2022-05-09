<div class="row mb-4">
    <div class="col-md-12">
        <div class="card" style="background-image: url('{{ url('/images/jumbotron.png') }}');">
            <div class="py-5 px-4 my-5 d-flex align-items-center text-center text-white">
                <div class="col-5">
                    <img src="{{ $course->pathAttachment() }}" class="img-fluid">
                </div>
                <div class="col-5 text-start ">
                    <h1>{{ __("Curso") }}: {{ $course->name }}</h1>
                    <h4>{{ __("Profresor") }}: {{ $course->teacher->user->name }}</h4>
                    <h5>{{ __("Categoria") }}: {{ $course->category->name }}</h5>
                    <h5>{{ __("Fecha de publicacion") }}: {{ $course->created_at->format('d/m/y') }}</h5>
                    <h5>{{ __("Fecha de actualizacion") }}: {{ $course->updated_at->format('d/m/y') }}</h5>
                    <h6>{{ __("Estudiantes inscritos") }}: {{ $course->students_count }}</h6>
                    <h6>{{ __("Numero de valoraciones") }}: {{ $course->reviews_count }}</h6>
                    @include('layouts.partials.courses.rating', ['rating' => $course->custom_rating])
                </div>
            </div>
        </div>
    </div>
</div>
