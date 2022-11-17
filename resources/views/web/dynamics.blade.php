@extends('web.layout')

@section('content')

<section class="sec11">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="content">
                    <h1>Participa y gana más puntos</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec12">
    <div class="container">
        <div class="row">
            <h2 class="tit">Dinámicas para puntos extras</h2>
            @foreach ($dynamics as $item)
            <div class="col-md-4">
                <div class="content">
                    <div class="image">
                        <img src="{{ $item->image }}" alt="">
                    </div>
                    <div class="text">
                        <h2>{{ $item->name }}</h2>
                        <p>Fecha de fin: {{ \Carbon\Carbon::parse($item->end_time)->format('d/m/Y g:i A') }}</p>
                        <a href="{{ route('dynamic', [$item->slug, $item->id]) }}" class="">Ver dinámica</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection