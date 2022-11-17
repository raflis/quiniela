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

<section class="sec13">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('web.partials.alert')
                <div class="content">
                    <div class="image">
                        <img src="{{ $dynamic->image }}" alt="">
                    </div>
                    <h1>{{ $dynamic->name }}</h1>
                    <div class="body">
                        {!! htmlspecialchars_decode($dynamic->body) !!}
                    </div>
                    <div class="formu">
                        {!! Form::open(['route' => 'saveDynamic', 'class' => 'needs-validation', 'novalidate', 'files' => true]) !!}
                        {!! Form::hidden('game_dynamic_id', $dynamic->id) !!}
                        @if($participated == 0)
                            @if(Carbon\Carbon::now()->toDateTimeString() <= $dynamic->end_time)
                            <div class="upload">
                                <p>Sube tu archivo para participar</p>
                                <label for="choose-file" class="custom-file-upload" id="choose-file-label">
                                    Sube tu archivo en formato .png, .jpg, o .pdf
                                </label>
                                <input name="file_front" type="file" id="choose-file" accept=".jpg,.jpeg,.png,.pdf" style="display: none;" />
                            </div>
                            <div class="formu-bottom text-center">
                                <button type="submit" class="btn btn-submit">Participar</button>
                            </div>
                            @else
                            <div class="upload">
                                <p>La fecha para participar ya terminó.</p>
                            </div>
                            @endif
                        @else
                            <div class="upload">
                                <p>Ya se encuentra participando de esta dinámica.</p>
                            </div>
                        @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec14">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    También te puede interesar
                </h2>
                <div class="carousel-dynamic-related">
                    @foreach ($related as $item)
                    <div class="item">
                        <div class="image">
                            <img src="{{ $item->image }}" alt="">
                        </div>
                        <div class="text">
                            <h2>{{ $item->name }}</h2>
                            <p>Fecha de fin: {{ \Carbon\Carbon::parse($item->end_time)->format('d/m/Y g:i A') }}</p>
                            <a href="{{ route('dynamic', [$item->slug, $item->id]) }}" class="">Ver dinámica</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection