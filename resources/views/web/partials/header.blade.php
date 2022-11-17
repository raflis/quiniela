<section id="header" class="{{ (in_array(Route::currentRouteName(), array('dynamics', 'dynamic', 'blog', 'post', 'terms', 'policy', 'login.reset')))?'oscuro':'' }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-5 col-md-3 left-menu">
                <a href="{{ route('index') }}">
                    <img src="{{ $pagefield->logo }}" alt="" class="img-fluid img-logo">
                </a>
            </div>
            <div class="col-7 col-md-9 right-menu">
                <ul class="ul_menu">
                    <li class="li_nav" id="nav_first">
                        <a href="{{ route('index') }}">Inicio</a>
                    </li>
                    <li class="li_nav" id="nav_first">
                        <a href="{{ route('games_result.16') }}">Resúmenes</a>
                    </li>
                    <li class="li_nav" id="nav_first">
                        <a href="{{ route('blog') }}">Datos curiosos</a>
                    </li>
                    <li class="li_nav">
                        @guest
                        <a href="" class="user_a" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Iniciar sesión
                        </a>
                        @else
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle user" href="#" id="menu_profile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/user.png') }}" alt=""> {{ ucwords(Auth::user()->name) }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="menu_profile">
                                @if (Auth::user()->role == 0)
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin') }}">
                                        <i class="fa-solid fa-toolbox"></i> Administrador
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        <i class="fa-regular fa-user"></i> Mi Perfil
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('predictions.16') }}">
                                        <i class="fa-regular fa-chart-bar"></i> Mis Predicciones
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('dynamics') }}">
                                        <i class="fa-solid fa-gamepad"></i> Dinámicas
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesión
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="fondo"></div>
    <div class="nav-mobile">
        <div class="burger burgergg">
            <div class="linea1"></div>
            <div class="linea2"></div>
            <div class="linea3"></div>
        </div>
        <div class="lists">
            <ul>
                <li>
                    <a class="lnk-head-mobile {{ (Route::currentRouteName() == 'index')?'active':'' }}" href="{{ route('index') }}">Inicio</a>
                </li>
                <li>
                    <a class="lnk-head-mobile {{ (Route::currentRouteName() == 'index')?'active':'' }}" href="{{ route('index') }}">Nosotros</a>
                </li>
                <li>
                    <a class="lnk-head-mobile {{ (Route::currentRouteName() == 'index' || Route::currentRouteName() == 'index')?'active':'' }}" href="{{ route('index') }}">Conciertos</a>
                </li>
                <li>
                    <a class="lnk-head-mobile {{ (Route::currentRouteName() == 'index' || Route::currentRouteName() == 'index')?'active':'' }}" href="{{ route('index') }}">Talleres de danza</a>
                </li>
                <li>
                    <a class="lnk-head-mobile @if(preg_match("/index|index/", Route::currentRouteName())) active @endif" href="{{ route('index') }}">Blog y noticias</a>
                </li>
                <li>
                    <a class="lnk-head-mobile {{ (Route::currentRouteName() == 'index')?'active':'' }}" href="{{ route('index') }}">Contacto</a>
                </li>
            </ul>
            <div class="bottom_">
                @guest
                <a href="" class="btn1" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</a>
                <a href="{{ route('login.create') }}" class="btn2">Registrarse</a>
                @else
                @if (Auth::user()->role == 0)
                <a href="{{ route('admin') }}" class="btn2">Administrador</a>
                @endif
                <a href="{{ route('profile.index') }}" class="btn2">Ver Perfil</a>
                <a href="{{ route('logout') }}" class="btn4">Cerrar Sesión</a>
                @endguest
                <a href="" class="btn3">Escríbenos al Whatsapp</a>
                <img src="{{ asset('images/logo.png') }}" alt="">
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="modal_login">
                <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h3>
                    Iniciar sesión
                </h3>
                <div class="alert alert-danger alert-dismissible fade show d-none" id="alert_login" role="alert">
                    Email o contraseña invalidos
                </div>
                <div class="alert alert-success alert-dismissible fade show d-none" id="alert_login_success" role="alert">
                    Logueado correctamente
                </div>
                <form action="{{ route('login.login') }}" method="POST" id="form_login">
                    @csrf
                    <input name="email" type="email" class="form-control" placeholder="Correo electrónico" required>
                    <input name="password" type="password" class="form-control" placeholder="Contraseña" required>
                    <a href="" class="a_forgot">
                        ¿Olvidó su contraseña?
                    </a>
                    <button type="submit">
                        Iniciar sesión
                    </button>
                    <p>
                        ¿No tienes una cuenta?
                        <a href="{{ route('login.create') }}" class="">
                            Regístrese aquí
                        </a>
                    </p>
                    
                </form>
            </div>
            <div class="modal-body" id="modal_forgot">
                <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h3>
                    Recupera tu contraseña
                </h3>
                <div class="alert alert-danger alert-dismissible fade show d-none" id="alert_forget_error" role="alert">
                    El email ingresado no existe o ha ocurrido un error
                </div>
                <div class="alert alert-success alert-dismissible fade show d-none" id="alert_forget_success" role="alert">
                    Hemos enviado un enlace para restablecer la contraseña al email ingresado. Si no lo recibes en unos minutos, revisa tu carpeta de spam.
                </div>
                <p class="tit">
                    Ingresa tu correo electrónico y revisa el mensaje que se enviará para restablecer tu contraseña
                </p>
                {!! Form::open(['route' => 'login.forget', 'id' => 'form_forget', 'class' => 'needs-validation', 'novalidate']) !!}
                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required id="email_forget">
                    <button type="submit">
                        RECUPERA TU CONTRASEÑA
                    </button>
                {!! Form::close() !!}
                <a href="" class="a_back_login">
                    Olvídelo, ya la recordé, iniciar sesión
                </a>
            </div>
        </div>
    </div>
</div>
@if(!in_array(Route::currentRouteName(), array('dynamics', 'dynamic', 'blog', 'post', 'terms', 'policy', 'login.reset')))
<section class="sec1">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="carousel-header">
                    @foreach ($sliders as $item)
                    <div class="item">
                        <div class="item-left">
                            <h1>
                                {{ $item->title1 }}
                            </h1>
                            <h2>
                                {{ $item->title2 }}
                            </h2>
                        </div>
                        <div class="item-right">
                            <img src="{{ $item->image }}" alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif