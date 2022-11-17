@extends('web.layout')

@section('content')

<section class="sec5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-blog">
                    DATOS CURIOSOS
                </h2>
                <div class="content">
                    @foreach ($posts as $item)
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