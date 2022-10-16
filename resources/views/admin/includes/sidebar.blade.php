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

        <div class="sidenav-menu-heading">Páginas</div>
        <a class="nav-link @if(preg_match("/pagefields.configuration/", Route::currentRouteName())) active @endif" 
        href="">
            <i class="fas fa-home text-gray pr-1"></i> Configuración
        </a>

        <div class="sidenav-menu-heading">Partidos</div>
        <a class="nav-link @if(preg_match("/games/", Route::currentRouteName())) active @endif" 
        href="{{ route('games.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Partidos
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