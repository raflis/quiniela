@extends('web.layout')

@section('content')

<section class="sec2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="upcoming-matches">
                    <div class="item-left">
                        <h2>
                            PRÓXIMOS<br>
                            PARTIDOS
                        </h2>
                    </div>
                    <div class="item-right">
                        <div class="carousel-upcoming-matches">
                            @foreach ($games as $item)
                            <div class="item">
                                <img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt="">
                                <p>
                                    <span>{{ substr(ucwords(\Carbon\Carbon::parse($item->match_date)->formatLocalized('%B')), 0, 3) }}, {{ \Carbon\Carbon::parse($item->match_date)->format('d') }}</span><br>
                                    {{ \Carbon\Carbon::parse($item->match_date)->isoFormat('H:mm A') }}
                                </p>
                                <img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>
                    RANKING DE PARTICIPANTES
                </h2>
                <div class="participant-ranking">
                    @foreach($users as $item)
                    <div class="item">
                        <div class="image" style="background-image: url('{{ asset('images/profiles/'.$item->avatar) }}')">
                            <p class="number">
                                {{ $loop->iteration }}
                            </p>
                        </div>
                        <h4>
                            {{ $item->name }} {{ $item->lastname }}
                        </h4>
                        <h5>
                            {{ $item->points }} puntos
                        </h5>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    RESUMEN DE LOS PARTIDOS
                </h2>
                <div class="content">
                    <div class="table1">
                        <table class="table">
                            @foreach($games_a as $item)
                            <tr>
                                <td class="date"><p>{{ substr(ucwords(\Carbon\Carbon::parse($item->match_date)->formatLocalized('%B')), 0, 3) }}, {{ \Carbon\Carbon::parse($item->match_date)->format('d') }}</p></td>
                                <td><p><img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""> {{ $item->team1->name }}</p></td>
                                <td><p>{{ $item->score1 }}</p></td>
                                <td><p>{{ $item->score2 }}</p></td>
                                <td><p><img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""> {{ $item->team2->name }}</p></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="table1">
                        <table class="table">
                            @foreach($games_b as $item)
                            <tr>
                                <td class="date"><p>{{ substr(ucwords(\Carbon\Carbon::parse($item->match_date)->formatLocalized('%B')), 0, 3) }}, {{ \Carbon\Carbon::parse($item->match_date)->format('d') }}</p></td>
                                <td><p><img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""> {{ $item->team1->name }}</p></td>
                                <td><p>{{ $item->score1 }}</p></td>
                                <td><p>{{ $item->score2 }}</p></td>
                                <td><p><img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""> {{ $item->team2->name }}</p></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="more">
                    <a class="btn btn-more" href="{{ route('games_result.16') }}">Ver más</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
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
                <div class="more">
                    <a class="btn btn-more" href="{{ route('blog') }}">Ver más datos curiosos</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection