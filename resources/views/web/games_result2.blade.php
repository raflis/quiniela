@extends('web.layout')

@section('content')

<section class="sec4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    RESUMEN DE LOS PARTIDOS
                </h2>
                <ul class="ul_links">
                    <li><a class="btn" href="{{ route('games_result.16') }}">Fase de grupos</a></li>
                    <li><a class="btn" href="{{ route('games_result.8') }}">Octavos de final</a></li>
                    <li><a class="btn" href="{{ route('games_result.4') }}">Cuartos de final</a></li>
                    <li><a class="btn active" href="{{ route('games_result.2') }}">Semifinales</a></li>
                    <li><a class="btn" href="{{ route('games_result.1') }}">Final</a></li>
                </ul>
                <div class="content content2">
                    <div class="table1">
                        <table class="table">
                            <tr>
                                <td colspan="5"><p class="tit">Semifinales</p></td>
                            </tr>
                            @foreach($games as $item)
                            <tr>
                                <td class="date"><p>{{ substr(ucwords(\Carbon\Carbon::parse($item->match_date)->formatLocalized('%B')), 0, 3) }}, {{ \Carbon\Carbon::parse($item->match_date)->format('d') }} {{ \Carbon\Carbon::parse($item->match_date)->format('- g:i A') }}</p></td>
                                <td>
                                    <p>
                                        @if($item->team1->name == 'Por definirse')
                                        <img height="18" src="{{ asset('images/countries/default.png') }}" alt=""> {{ $item->team1->name }}
                                        @else
                                        <img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""> {{ $item->team1->name }}
                                        @endif
                                    </p>
                                </td>
                                <td><p>{{ $item->score1 }}</p></td>
                                <td><p>{{ $item->score2 }}</p></td>
                                <td>
                                    <p>
                                        @if($item->team2->name == 'Por definirse')
                                        <img height="18" src="{{ asset('images/countries/default.png') }}" alt=""> {{ $item->team2->name }}
                                        @else
                                        <img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""> {{ $item->team2->name }}
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection