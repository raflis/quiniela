@extends('web.layout')

@section('content')

<section class="sec10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Política de privacidad</h1>
                {!! htmlspecialchars_decode($pagefield->policy) !!}
            </div>
        </div>
    </div>
</section>

@endsection