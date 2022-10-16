@extends('web.layout')

@section('content')

<section class="sec25">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <p>
                        Perfil
                    </p>
                    <h2>
                        {{ (Auth::user()->gender == 'Masculino')?'Bienvenido':'Bienvenida' }}, {{ ucwords(Auth::user()->name) }} {{ ucwords(Auth::user()->lastname) }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec26">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 px-0">
                <div class="content">
                    <div class="content_left">
                        <ul>
                            <li class="">
                                <a href="{{ route('profile.index') }}">
                                    <i class="fa-solid fa-address-card"></i> Mis datos
                                </a>
                            </li>
                            <li class="active">
                                <a href="{{ route('profile.workshops') }}">
                                    <i class="fa-solid fa-briefcase"></i> Mis talleres
                                </a>
                            </li>
                            @if(Auth::user()->membership != 'none')
                            <li class="">
                                <a href="{{ route('profile.membership') }}">
                                    <i class="fa-solid fa-credit-card"></i> Mi facturación
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="content_right">
                        <div class="tit_workshops">
                            <h3>Mis talleres</h3>
                        </div>
                        <div class="tickets">
                            <div class="ticket">
                                <div class="tit">
                                    <p>
                                        “Talleres”
                                    </p>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="t1"></th>
                                            <th>Categoria</th>
                                            <th>Fecha del taller</th>
                                            <th>Medio de pago</th>
                                            <th>Fecha de pago</th>
                                            <th>Código de pago</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->sales as $item)
                                            @foreach ($item->detail as $it)
                                            <tr>
                                                <td class="t1">
                                                    <a>
                                                        {{ $it['name'] }}
                                                    </a>
                                                </td>
                                                <td><p>{{ $it['category'] }}</p></td>
                                                <td><p>{{ ucwords(\Carbon\Carbon::parse($it['event_date'])->formatLocalized('%A, %d de %B %Y'), 'UTF-8') }}</p></td>
                                                <td><p>{{ $item->effectiveBrand }} - {{ $item->card }}</p></td>
                                                <td><p>{{ \Carbon\Carbon::parse($item->transaction_date)->format('d/m/Y H:i:s') }}</p></td>
                                                <td><p>{{ $item->purchase_number }}</p></td>
                                                <td><p>S/ {{ $it['price'] }}</p></td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection