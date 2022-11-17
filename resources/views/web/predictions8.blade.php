@extends('web.layout')

@section('content')

<section class="sec6">
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                MIS PREDICCIONES
            </h2>
            <ul class="ul_links">
                <li><a class="btn" href="{{ route('predictions.16') }}">Fase de grupos</a></li>
                <li><a class="btn active" href="{{ route('predictions.8') }}">Octavos de final</a></li>
                <li><a class="btn" href="{{ route('predictions.4') }}">Cuartos de final</a></li>
                <li><a class="btn" href="{{ route('predictions.2') }}">Semifinales</a></li>
                <li><a class="btn" href="{{ route('predictions.1') }}">Final</a></li>
            </ul>
            <p class="text">* Complete los resultados de todos los partidos por grupos y guarde sus resultados para ganar puntos</p>
            <div class="col-md-12">
                @include('web.partials.alert')
            </div>
            <form action="{{ route('saveMyPrediction') }}" class="row justify-content-center needs-validation" method="POST" novalidate>
            @csrf
            <div class="col-md-8">
                <div class="title">
                    <p>Octavos de final</p>
                </div>
                <div class="table_group">
                    <table class="table">
                        @foreach ($games as $item)
                        <tr>
                            <td width="40%"></td>
                            <td class="date" width="20%"><span>{{ \Carbon\Carbon::parse($item->match_date)->format('d/m - H:i') }}</span></td>
                            <td width="40%"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="game_id[{{ $item->id }}]" value="{{ $item->id }}">
                            <td class="country_left" align="right" valign="middle"><span>{{ $item->team1->name }}</span><img src="{{ ($item->team1->name == "Por definirse")?asset('images/countries/default.png'):asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""></td>
                            <td class="score" align="center" valign="middle"><input type="number" class="predit" name="result1[{{ $item->id }}]" min=0 required value="{{ ($results_all && isset($results_all['game_'.$item->id]))?$results_all['game_'.$item->id]['result1']:0 }}"><span>-</span><input class="predit" type="number" name="result2[{{ $item->id }}]" min=0 required value="{{ ($results_all && isset($results_all['game_'.$item->id]))?$results_all['game_'.$item->id]['result2']:0 }}"></td>
                            <td class="country_right" align="left" valign="middle"><img src="{{ ($item->team2->name == "Por definirse")?asset('images/countries/default.png'):asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""><span>{{ $item->team2->name }}</span></td>
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
            @if(Carbon\Carbon::now()->toDateTimeString() <= $pagefield->end_phase8)
            <div class="col-md-12 text-center">
                <button class="btn btn-confirmar">Confirmar</button>
            </div>
            @endif
            </form>
        </div>
    </div>
</section>

@endsection