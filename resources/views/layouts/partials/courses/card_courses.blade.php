<div class="card card-01">
    <img class="card-img-top" src="{{ $course->pathAttachment() }}" alt="{{ $course->name }}" />
    <div class="card-body">
        <span class="badge badge-box"><i class="fa fa-check"></i></span>
        <h4 class="card-title">{{ $course->name }}</h4>
        <hr>
        <div class="row justify-content-center">
{{--            anadir parcial para mostrar el rating--}}
        </div>
        <hr>
        <span class="badge badge-danger badge-cat">{{ $course->category->name }}</span>
        <p class="card-text">
            {{ \Illuminate\Support\Str::limit($course->description, 100) }}
        </p>
        <a href="{{ route('courses.detail', $course->slug) }}" class="btn btn-course btn-block">Mas informacion...</a>
    </div>
</div>
