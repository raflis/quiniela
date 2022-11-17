<div class="layoutNav shadow" id="#navDesktop">
    <div class="nav-items">
        <div class="sidenav-menu-heading mt-3">Dashboard</div>
        <a class="nav-link @if(Route::currentRouteName()=="admin") active @endif" 
        href="{{ route('admin') }}">
            <i class="fas fa-tachometer-alt text-gray pr-1"></i> Dashboard
        </a>
        <a class="nav-link" target="_blank" 
        href="{{ route('index') }}">
            <i class="fas fa-globe text-gray pr-1"></i> Ver Web
        </a>

        <div class="sidenav-menu-heading">Usuarios</div>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('users.index', 'users.create', 'users.edit'))) active @endif" 
        href="{{ route('users.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Usuarios
        </a>
        <a class="nav-link @if(preg_match("/game_dynamic_users/", Route::currentRouteName())) active @endif" 
        href="{{ route('game_dynamic_users.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Participaciones dinámicas
        </a>

        <div class="sidenav-menu-heading">Páginas</div>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('pagefields.configuration'))) active @endif" 
        href="{{ route('pagefields.configuration') }}">
            <i class="fas fa-home text-gray pr-1"></i> Configuración
        </a>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('pagefields.terms'))) active @endif" 
        href="{{ route('pagefields.terms') }}">
            <i class="fas fa-home text-gray pr-1"></i> Términos y condiciones
        </a>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('pagefields.policy'))) active @endif" 
        href="{{ route('pagefields.policy') }}">
            <i class="fas fa-home text-gray pr-1"></i> Política de privacidad
        </a>

        <div class="sidenav-menu-heading">Secciones</div>
        <a class="nav-link @if(preg_match("/game_dynamics/", Route::currentRouteName())) active @endif" 
        href="{{ route('game_dynamics.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Dinámicas
        </a>
        <a class="nav-link @if(preg_match("/sliders/", Route::currentRouteName())) active @endif" 
        href="{{ route('sliders.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Sliders
        </a>
        <a class="nav-link @if(preg_match("/posts/", Route::currentRouteName())) active @endif" 
        href="{{ route('posts.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Curiosidades
        </a>

        <div class="sidenav-menu-heading">Partidos</div>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('games.index', 'games.create', 'games.edit'))) active @endif" 
        href="{{ route('games.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Partidos (Fase grupos)
        </a>
        <a class="nav-link @if(preg_match("/games_final/", Route::currentRouteName())) active @endif" 
        href="{{ route('games_final.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Partidos (Fase final)
        </a>

        {{-- <a class="nav-link @if(in_array(Route::currentRouteName(), array('pagefields.choose'))) active @endif" 
        href="{{ route('pagefields.choose') }}">
            <i class="fas fa-home text-gray pr-1"></i> ¿Porqué elegirnos?
        </a>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('pagefields.achievement'))) active @endif" 
        href="{{ route('pagefields.achievement') }}">
            <i class="fas fa-home text-gray pr-1"></i> Nuestros logros
        </a>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('partners.index', 'partners.edit', 'partners.create'))) active @endif" 
        href="{{ route('partners.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Partners
        </a>

        <div class="sidenav-menu-heading">Cursos & Insignias</div>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('course_subareas.index', 'course_subareas.edit', 'course_subareas.create'))) active @endif" 
        href="{{ route('course_subareas.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Sub Áreas
        </a>
        <a class="nav-link @if(preg_match("/course_areas|course_categories|courses|topics|badge/", Route::currentRouteName())) active @endif" 
        href="{{ route('course_areas.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Áreas de capacitación
        </a>

        <div class="sidenav-menu-heading">Equipo</div>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('worker_managers.index', 'worker_managers.edit', 'worker_managers.create'))) active @endif" 
        href="{{ route('worker_managers.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Dirección
        </a>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('worker_teachers.index', 'worker_teachers.edit', 'worker_teachers.create'))) active @endif" 
        href="{{ route('worker_teachers.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Docentes
        </a>
        <a class="nav-link @if(in_array(Route::currentRouteName(), array('worker_administrators.index', 'worker_administrators.edit', 'worker_administrators.create'))) active @endif" 
        href="{{ route('worker_administrators.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Administración
        </a>

        <div class="sidenav-menu-heading">Páginas</div>
        <a class="nav-link @if(preg_match("/pagefields.cover_page/", Route::currentRouteName())) active @endif" 
        href="{{ route('pagefields.cover_page') }}">
            <i class="fas fa-home text-gray pr-1"></i> Portadas & títulos
        </a>
        <a class="nav-link @if(preg_match("/pagefields.support/", Route::currentRouteName())) active @endif" 
        href="{{ route('pagefields.support') }}">
            <i class="fas fa-home text-gray pr-1"></i> Soporte
        </a>

        <div class="sidenav-menu-heading">Blog</div>
        <a class="nav-link @if(preg_match("/blog_tags/", Route::currentRouteName())) active @endif" 
        href="{{ route('blog_tags.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Tags
        </a>
        <a class="nav-link @if(preg_match("/blog_categories/", Route::currentRouteName())) active @endif" 
        href="{{ route('blog_categories.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Categorías y Entradas
        </a> --}}

    </div>
    <div class="nav-footer">
        <p>Logueado como:</p>
        <p>{{ ucwords(Auth::user()->name) }} {{ ucwords(Auth::user()->lastname) }}</p>
        <p>{{ getRole(Auth::user()->role) }}</p>
    </div>
</div>