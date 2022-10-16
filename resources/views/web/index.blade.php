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

<section class="sec2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="upcoming-matches">
                    <div class="item-left">
                        <h2>
                            PRÓXIMOS<br>
                            PARTIDOS
                        </h2>
                    </div>
                    <div class="item-right">
                        <div class="carousel-upcoming-matches">
                            @for ($i = 0; $i < 10; $i++)
                            <div class="item">
                                <img src="{{ asset('images/flags/country1.png') }}" alt="">
                                <p>
                                    <span>Nov, 20</span><br>
                                    10:00 PM
                                </p>
                                <img src="{{ asset('images/flags/country2.png') }}" alt="">
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>
                    RANKING DE PARTICIPANTES
                </h2>
                <div class="participant-ranking">
                    @for ($i = 0; $i < 10; $i++)
                    <div class="item">
                        <div class="image">
                            <p class="number">
                                1
                            </p>
                            <img src="{{ asset('images/user-man.png') }}" alt="">
                        </div>
                        <h4>
                            Carlos Barket
                        </h4>
                        <h5>
                            50 puntos
                        </h5>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    RESUMEN DE LOS PARTIDOS
                </h2>
                <div class="content">
                    <div class="table1">
                        <table class="table">
                            @for ($i = 0; $i < 10; $i++)
                            <tr>
                                <td class="date"><p>Nov, 20</p></td>
                                <td><p>QAT</p></td>
                                <td><p>3</p></td>
                                <td><p>2</p></td>
                                <td><p>ECU</p></td>
                            </tr>
                            @endfor
                        </table>
                    </div>
                    <div class="table1">
                        <table class="table">
                            @for ($i = 0; $i < 10; $i++)
                            <tr>
                                <td class="date"><p>Nov, 20</p></td>
                                <td><p>QAT</p></td>
                                <td><p>3</p></td>
                                <td><p>2</p></td>
                                <td><p>ECU</p></td>
                            </tr>
                            @endfor
                        </table>
                    </div>
                </div>
                <div class="more">
                    <a class="btn btn-more" href="">Ver más</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    DATOS CURIOSOS
                </h2>
                <div class="content">
                    <div class="item">
                        <div class="image">
                            <img src="{{ asset('images/blog1.png') }}" alt="">
                        </div>
                        <div class="description">
                            <p class="date">Nov, 20</p>
                            <h3>Maldición de los mundiales</h3>
                            <p class="text">
                                ¿Qué selección será victima
                                de la maldición de los
                                mundiales?
                            </p>
                            <a href="">Seguir leyendo</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="image">
                            <img src="{{ asset('images/blog2.png') }}" alt="">
                        </div>
                        <div class="description">
                            <p class="date">Nov, 20</p>
                            <h3>Maldición de los mundiales</h3>
                            <p class="text">
                                ¿Qué selección será victima
                                de la maldición de los
                                mundiales?
                            </p>
                            <a href="">Seguir leyendo</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="image">
                            <img src="{{ asset('images/blog2.png') }}" alt="">
                        </div>
                        <div class="description">
                            <p class="date">Nov, 20</p>
                            <h3>Maldición de los mundiales</h3>
                            <p class="text">
                                ¿Qué selección será victima
                                de la maldición de los
                                mundiales?
                            </p>
                            <a href="">Seguir leyendo</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="image">
                            <img src="{{ asset('images/blog2.png') }}" alt="">
                        </div>
                        <div class="description">
                            <p class="date">Nov, 20</p>
                            <h3>Maldición de los mundiales</h3>
                            <p class="text">
                                ¿Qué selección será victima
                                de la maldición de los
                                mundiales?
                            </p>
                            <a href="">Seguir leyendo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection