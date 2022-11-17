<div class="footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="content">
                    <ul>
                        <li><a href="{{ route('terms') }}">Términos y condiciones</a></li>
                        <li><a href="{{ route('policy') }}">Políticas de privacidad</a></li>
                    </ul>
                    <img src="{{ $pagefield->logo }}" alt="">
                    <p>
                        {{ $pagefield->footer_text }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>