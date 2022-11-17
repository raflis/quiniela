@extends('web.layout')

@section('content')

<section class="sec10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Términos y condiciones</h1>
                {!! htmlspecialchars_decode($pagefield->terms) !!}
            </div>
        </div>
    </div>
</section>

@endsection