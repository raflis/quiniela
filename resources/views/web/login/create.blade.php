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

<section class="login_create">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="content">
                    <p class="tit_small">
                        Registro de usuario
                    </p>
                    <p class="tit">
                        Creación de Perfil
                    </p>
                    @include('web.partials.alert')
                    {!! Form::open(['route' => 'login.store', 'class' => 'row needs-validation', 'novalidate']) !!}
                        <div class="form-group col-md-12">
                            <label class="input-label" for="">Nombres</label>
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombres', 'required']) }}
                        </div>
                        <div class="form-group col-md-12">
                            <label class="input-label" for="">Apellidos</label>
                            {{ Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Apellidos', 'required']) }}
                        </div>
                        <div class="form-group col-md-12">
                            <label class="input-label" for="">Correo Electrónico</label>
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese correo electrónico', 'required']) }}
                        </div>
                        <div class="form-group col-md-12">
                            <label class="input-label" for="">Fecha de Nacimiento</label>
                                {{ Form::date('birthday', null, ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group col-md-12">
                            <label class="input-label" for="">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                        </div>
                        <div class="form-check col-md-12">
                            <input class="form-check-input" type="checkbox" value="1" id="legal" name="legal" required>
                            <label class="form-check-label" for="legal">
                                Declaro que he leído y acepto los <a href="">Términos y Condiciones</a> y <a href="">Política de Privacidad</a> de Quiniela.
                            </label>
                        </div>
                        <div class="form-group col-md-12 text-center">
                            <button type="submit" class="btn btn-submit">Regístrar usuario</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection