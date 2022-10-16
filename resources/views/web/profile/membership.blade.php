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
                            <li class="">
                                <a href="{{ route('profile.workshops') }}">
                                    <i class="fa-solid fa-briefcase"></i> Mis talleres
                                </a>
                            </li>
                            @if(Auth::user()->membership != 'none')
                            <li class="active">
                                <a href="{{ route('profile.membership') }}">
                                    <i class="fa-solid fa-credit-card"></i> Mi facturación
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="content_right">
                        <div class="tit_membership">
                            <h3>Mi facturación</h3>
                        </div>
                        @include('web.partials.alert')
                        <div class="membership">
                            <p>
                                <span>Nombres y apellidos:</span> {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                            </p>
                            <p>
                                <span>Documento:</span> {{ Auth::user()->type_document }} {{ Auth::user()->document }}
                            </p>
                            <p>
                                <span>Email:</span> {{ Auth::user()->email }}
                            </p>
                            <div class="text-start mt-4">
                                @if (Auth::user()->membership != 'active')
                                <h4>Pagar membresía:</h4>
                                <!-- payment form -->
                                <div class="kr-embedded"  kr-popin kr-form-token="{{ $token }}">
                                    <!-- payment form fields -->
                                    {{ csrf_field() }}
                                    <div class="kr-pan"></div>
                                    <div class="kr-expiry"></div>
                                    <div class="kr-security-code"></div>
                                    <!-- payment form submit button -->
                                    <button class="kr-payment-button"></button>
                                    <!-- error zone -->
                                    <div class="kr-form-error"></div>
                                </div>
                                @else
                                    <p>
                                        <span>Tarjeta:</span> {{ $subscription->effectiveBrand }} {{ $subscription->card }}
                                    </p>
                                    <p class="mb-3">
                                        <span>Monto: </span> {{ $subscription->amount }} {{ $subscription->currency }}
                                    </p>
                                    <button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#membershipCancel">
                                        <i class="fa-regular fa-credit-card"></i> Cancelar membresía
                                    </button>                           
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="membershipCancel" tabindex="-1" role="dialog" aria-labelledby="deletingLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
            <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
            <i class="fas fa-exclamation-circle fa-5x text-danger mb-3"></i>
            <p class="mb-0 font-bold first">¿Estás seguro?</p>
            <p class="mb-0 font-light second">Si continuas estarás cancelando tu membresía.</p>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
            {!! Form::open(['route' => ['profile.membershipCancel', ''], 'method' => 'POST', 'class' => 'needs-validation', 'novalidate']) !!}
                <button class="btn btn-danger text-white">
                    Sí, cancelar membresía
                </button>                           
            {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>

@endsection

@section('css')

<script 
   src="{{ $credentials['endpoint'] }}/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js" 
   kr-public-key="{{ $credentials['publicKey'] }}" 
   kr-post-url-success="{{ route('profile.membershipPost') }}">
</script>
<link rel="stylesheet" href="{{ $credentials['endpoint'] }}/static/js/krypton-client/V4.0/ext/classic-reset.css">
<script src="{{ $credentials['endpoint'] }}/static/js/krypton-client/V4.0/ext/classic.js"></script>

@endsection