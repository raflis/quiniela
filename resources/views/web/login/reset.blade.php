@extends('web.layout')

@section('content')

<section class="login_reset">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="content">
                    <h1>
                        RESTAURAR CONTRASEÑA
                    </h1>
                    @if ($variable <> 1)
                    <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                        {{ $variable }}
                    </div>
                    @else
                    @include('web.partials.alert')
                    {!! Form::open(['route' => 'login.reset', 'class' => 'needs-validation', 'novalidate']) !!}
                        {{ Form::hidden('email', $email) }}
                        <div class="mb-3">
                            <label for="" class="form-label">Contraseña nueva</label>
                            {{ Form::password('newpassword', ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirma tu nueva contraseña</label>
                            {{ Form::password('renewpassword', ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-submit">Restaurar contraseña</button>
                        </div>
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection