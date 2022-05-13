<div class="col-12 pt-0 mt-4">
    <h2 class="text-muted">
        {{ __("Cursos similares") }}
    </h2>
    <hr>
</div>
<div class="container-fluid">
    <div class="row">
        @forelse($related as $relatedCourse)
            <div class="col-md-6 listing-block">
                <div class="media d-flex">
                    <div class="fav-box">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('courses.detail', $relatedCourse->slug) }}">
                        <img src="{{ $relatedCourse->pathAttachment() }} "
                             class="d-flex align-self-start"
                             alt="{{$relatedCourse->name}}"
                        >
                    </a>
                    <div class="media-body ps-3">
                        <div class="price">
                            <a style="text-decoration: none" href="{{ route('courses.detail', $relatedCourse->slug) }}"><small>{{ $relatedCourse->name }}</small></a>
                        </div>
                        <div class="stats">
                            @include('layouts.partials.courses.rating', ['course' => $relatedCourse, 'rating' => $relatedCourse->custom_rating])
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-dark">
                {{ __("No existe ningun curso relacionado") }}
            </div>
        @endforelse
    </div>
</div>
