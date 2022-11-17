@extends('web.layout')

@section('content')

<section class="sec8">
    <div class="container">
        <div class="row">
            <div class="col-md-12 breadcrumb-post">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blog') }}">Curiosidades</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a>{{ $post->name }}</a></li>
                    </ol>
                  </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 content-left wow fadeIn" data-wow-delay="0.5s">
                <img src="{{ $post->image2 }}" alt="">
            </div>
            <div class="col-md-1 px-0"></div>
            <div class="col-md-7 content-right wow fadeIn" data-wow-delay="0.5s">
                <div class="description">
                    <p class="title">
                        {{ $post->name }}
                    </p>
                </div>
                <div class="content">
                    {!! htmlspecialchars_decode($post->body) !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec9">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    También te puede interesar
                </h2>
                <div class="carousel-blog-related">
                    @foreach ($related as $item)
                    <div class="item">
                        <div class="image">
                            <img src="{{ $item->image1 }}" alt="">
                        </div>
                        <div class="description">
                            <p class="date">{{ substr(ucwords(\Carbon\Carbon::parse($item->created_at)->formatLocalized('%B')), 0, 3) }}, {{ \Carbon\Carbon::parse($item->created_at)->format('d') }}</p>
                            <h3>{{ $item->name }}</h3>
                            <p class="text">
                                {{ $item->abstract }}
                            </p>
                            <a href="{{ route('post', [$item->slug, $item->id]) }}">Seguir leyendo</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection