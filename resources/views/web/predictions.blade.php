@extends('web.layout')

@section('content')

<section class="sec1">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="carousel-header">
                    <div class="item">
                        <div class="item-left">
                            <h1>
                                QUINIELA
                            </h1>
                            <h2>
                                2022
                            </h2>
                        </div>
                        <div class="item-right">
                            <img src="{{ asset('images/man.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec6">
    <div class="container">
        <div class="row">
            <h2>
                MIS PREDICCIONES
            </h2>
            <p class="text">* Complete los resultados de todos los partidos por grupos y guarde sus resultados para ganar puntos</p>
            <div class="col-md-12">
                @include('web.partials.alert')
            </div>
            <form action="{{ route('saveMyPrediction') }}" class="row needs-validation" method="POST" novalidate>
            @csrf
            <div class="col-md-6">
                <div class="title">
                    <p>Grupo A</p>
                </div>
                <div class="table_group">
                    <table class="table">
                        @foreach ($games_a as $item)
                        <tr>
                            <td width="40%"></td>
                            <td class="date" width="20%"><span>{{ \Carbon\Carbon::parse($item->match_date)->format('d/m - H:i') }}</span></td>
                            <td width="40%"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="game_id[{{ $item->id }}]" value="{{ $item->id }}">
                            <td class="country_left" align="right" valign="middle"><span>{{ $item->team1->name }}</span><img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""></td>
                            <td class="score" align="center" valign="middle"><input type="number" class="predit" name="result1[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result1']:0 }}"><span>-</span><input class="predit" type="number" name="result2[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result2']:0 }}"></td>
                            <td class="country_right" align="left" valign="middle"><img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""><span>{{ $item->team2->name }}</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    <p>Grupo B</p>
                </div>
                <div class="table_group">
                    <table class="table">
                        @foreach ($games_b as $item)
                        <tr>
                            <td width="40%"></td>
                            <td class="date" width="20%"><span>{{ \Carbon\Carbon::parse($item->match_date)->format('d/m - H:i') }}</span></td>
                            <td width="40%"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="game_id[{{ $item->id }}]" value="{{ $item->id }}">
                            <td class="country_left" align="right" valign="middle"><span>{{ $item->team1->name }}</span><img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""></td>
                            <td class="score" align="center" valign="middle"><input type="number" class="predit" name="result1[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result1']:0 }}"><span>-</span><input class="predit" type="number" name="result2[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result2']:0 }}"></td>
                            <td class="country_right" align="left" valign="middle"><img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""><span>{{ $item->team2->name }}</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    <p>Grupo C</p>
                </div>
                <div class="table_group">
                    <table class="table">
                        @foreach ($games_c as $item)
                        <tr>
                            <td width="40%"></td>
                            <td class="date" width="20%"><span>{{ \Carbon\Carbon::parse($item->match_date)->format('d/m - H:i') }}</span></td>
                            <td width="40%"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="game_id[{{ $item->id }}]" value="{{ $item->id }}">
                            <td class="country_left" align="right" valign="middle"><span>{{ $item->team1->name }}</span><img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""></td>
                            <td class="score" align="center" valign="middle"><input type="number" class="predit" name="result1[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result1']:0 }}"><span>-</span><input class="predit" type="number" name="result2[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result2']:0 }}"></td>
                            <td class="country_right" align="left" valign="middle"><img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""><span>{{ $item->team2->name }}</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    <p>Grupo D</p>
                </div>
                <div class="table_group">
                    <table class="table">
                        @foreach ($games_d as $item)
                        <tr>
                            <td width="40%"></td>
                            <td class="date" width="20%"><span>{{ \Carbon\Carbon::parse($item->match_date)->format('d/m - H:i') }}</span></td>
                            <td width="40%"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="game_id[{{ $item->id }}]" value="{{ $item->id }}">
                            <td class="country_left" align="right" valign="middle"><span>{{ $item->team1->name }}</span><img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""></td>
                            <td class="score" align="center" valign="middle"><input type="number" class="predit" name="result1[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result1']:0 }}"><span>-</span><input class="predit" type="number" name="result2[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result2']:0 }}"></td>
                            <td class="country_right" align="left" valign="middle"><img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""><span>{{ $item->team2->name }}</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    <p>Grupo E</p>
                </div>
                <div class="table_group">
                    <table class="table">
                        @foreach ($games_e as $item)
                        <tr>
                            <td width="40%"></td>
                            <td class="date" width="20%"><span>{{ \Carbon\Carbon::parse($item->match_date)->format('d/m - H:i') }}</span></td>
                            <td width="40%"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="game_id[{{ $item->id }}]" value="{{ $item->id }}">
                            <td class="country_left" align="right" valign="middle"><span>{{ $item->team1->name }}</span><img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""></td>
                            <td class="score" align="center" valign="middle"><input type="number" class="predit" name="result1[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result1']:0 }}"><span>-</span><input class="predit" type="number" name="result2[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result2']:0 }}"></td>
                            <td class="country_right" align="left" valign="middle"><img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""><span>{{ $item->team2->name }}</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    <p>Grupo F</p>
                </div>
                <div class="table_group">
                    <table class="table">
                        @foreach ($games_f as $item)
                        <tr>
                            <td width="40%"></td>
                            <td class="date" width="20%"><span>{{ \Carbon\Carbon::parse($item->match_date)->format('d/m - H:i') }}</span></td>
                            <td width="40%"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="game_id[{{ $item->id }}]" value="{{ $item->id }}">
                            <td class="country_left" align="right" valign="middle"><span>{{ $item->team1->name }}</span><img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""></td>
                            <td class="score" align="center" valign="middle"><input type="number" class="predit" name="result1[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result1']:0 }}"><span>-</span><input class="predit" type="number" name="result2[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result2']:0 }}"></td>
                            <td class="country_right" align="left" valign="middle"><img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""><span>{{ $item->team2->name }}</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    <p>Grupo G</p>
                </div>
                <div class="table_group">
                    <table class="table">
                        @foreach ($games_g as $item)
                        <tr>
                            <td width="40%"></td>
                            <td class="date" width="20%"><span>{{ \Carbon\Carbon::parse($item->match_date)->format('d/m - H:i') }}</span></td>
                            <td width="40%"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="game_id[{{ $item->id }}]" value="{{ $item->id }}">
                            <td class="country_left" align="right" valign="middle"><span>{{ $item->team1->name }}</span><img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""></td>
                            <td class="score" align="center" valign="middle"><input type="number" class="predit" name="result1[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result1']:0 }}"><span>-</span><input class="predit" type="number" name="result2[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result2']:0 }}"></td>
                            <td class="country_right" align="left" valign="middle"><img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""><span>{{ $item->team2->name }}</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    <p>Grupo H</p>
                </div>
                <div class="table_group">
                    <table class="table">
                        @foreach ($games_h as $item)
                        <tr>
                            <td width="40%"></td>
                            <td class="date" width="20%"><span>{{ \Carbon\Carbon::parse($item->match_date)->format('d/m - H:i') }}</span></td>
                            <td width="40%"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="game_id[{{ $item->id }}]" value="{{ $item->id }}">
                            <td class="country_left" align="right" valign="middle"><span>{{ $item->team1->name }}</span><img src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""></td>
                            <td class="score" align="center" valign="middle"><input type="number" class="predit" name="result1[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result1']:0 }}"><span>-</span><input class="predit" type="number" name="result2[{{ $item->id }}]" min=0 required value="{{ ($results_all && $results_all['game_'.$item->id])?$results_all['game_'.$item->id]['result2']:0 }}"></td>
                            <td class="country_right" align="left" valign="middle"><img src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""><span>{{ $item->team2->name }}</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button class="btn btn-confirmar">Confirmar</button>
            </div>
            </form>
        </div>
    </div>
</section>

@endsection