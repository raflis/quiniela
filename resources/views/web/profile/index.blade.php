@extends('web.layout')

@section('content')

<section class="sec7">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content">
                    @include('web.partials.alert')
                    {!! Form::model(Auth::user(), ['route' => ['profile.update', Auth::user()->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate', 'files' => true]) !!}
                    <div class="formu">

                        <div class="formu-left">
                            <div class="item item3">
                                <label for="choose-file" class="custom-file-upload" id="choose-file-label">
                                Sube tu foto de perfil
                                </label>
                                <input name="avatar_front" type="file" id="choose-file" accept=".jpg,.jpeg,.png" style="display: none;" />
                                <div class="avatar_photo">
                                @if (Auth::user()->avatar == 'avatar.png')
                                <img src="{{ asset('images/usuario.png') }}" alt="">
                                @else
                                <img src="{{ asset('images/profiles/'.Auth::user()->avatar) }}" alt="">
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="formu-right">
                            <div class="points">
                                <div class="position">
                                    <p class="btn-default">Posición {{ $users_q }}/{{ $users_q }}</p>
                                </div>
                                <div class="points">
                                    <p class="btn-default">{{ Auth::user()->points }} puntos</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="input-label">Nombres</label>
                                {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label class="input-label">Apellidos</label>
                                {{ Form::text('lastname', null, ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label class="input-label">País</label>
                                {{ Form::select('country', countries(), null, ['class' => 'form-select', 'placeholder' => 'Selecciona tu país', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label class="input-label">Cargo laboral</label>
                                {{ Form::text('position', null, ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label class="input-label">Fecha de Nacimiento</label>
                                    {{ Form::date('birthday', \Carbon\Carbon::parse(Auth::user()->birthday)->format('Y-m-d'), ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="form-group">
                                <label class="input-label">Email</label>
                                {{ Form::text('hidden_input', Auth::user()->email, ['class' => 'form-control', 'required', 'readonly']) }}
                            </div>
                            <div class="form-group">
                                <label class="input-label" for="">Contraseña</label>
                                {{ Form::password('newpassword', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label class="input-label" for="">Repetir Contraseña</label>
                                {{ Form::password('renewpassword', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="formu-bottom">
                            <button type="submit" class="btn btn-submit">Actualizar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection