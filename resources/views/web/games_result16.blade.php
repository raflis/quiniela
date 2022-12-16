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
                    <li><a class="btn active" href="{{ route('games_result.16') }}">Fase de grupos</a></li>
                    <li><a class="btn" href="{{ route('games_result.8') }}">Octavos de final</a></li>
                    <li><a class="btn" href="{{ route('games_result.4') }}">Cuartos de final</a></li>
                    <li><a class="btn" href="{{ route('games_result.2') }}">Semifinales</a></li>
                    <li><a class="btn" href="{{ route('games_result.3') }}">Tercer lugar</a></li>
                    <li><a class="btn" href="{{ route('games_result.1') }}">Final</a></li>
                </ul>
                <div class="content">
                    <div class="table1">
                        <table class="table">
                            <tr>
                                <td colspan="5"><p class="tit">Grupo A</p></td>
                            </tr>
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
                            <tr>
                                <td colspan="5"><p class="tit">Grupo B</p></td>
                            </tr>
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
                    <div class="table1">
                        <table class="table">
                            <tr>
                                <td colspan="5"><p class="tit">Grupo C</p></td>
                            </tr>
                            @foreach($games_c as $item)
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
                            <tr>
                                <td colspan="5"><p class="tit">Grupo D</p></td>
                            </tr>
                            @foreach($games_d as $item)
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
                            <tr>
                                <td colspan="5"><p class="tit">Grupo E</p></td>
                            </tr>
                            @foreach($games_e as $item)
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
                            <tr>
                                <td colspan="5"><p class="tit">Grupo F</p></td>
                            </tr>
                            @foreach($games_f as $item)
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
                            <tr>
                                <td colspan="5"><p class="tit">Grupo G</p></td>
                            </tr>
                            @foreach($games_g as $item)
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
                            <tr>
                                <td colspan="5"><p class="tit">Grupo H</p></td>
                            </tr>
                            @foreach($games_h as $item)
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
            </div>
        </div>
    </div>
</section>

@endsection