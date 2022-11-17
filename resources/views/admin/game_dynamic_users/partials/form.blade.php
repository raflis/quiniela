<div class="form-group col-sm-12">
  <p>
    <strong>Nombre del usuario: </strong>
    <small>{{ $game_dynamic_user->user->name }} {{ $game_dynamic_user->user->lastname }}</small>
    <br>
    <strong>Nombre de la dinámica: </strong>
    <small>{{ $game_dynamic_user->game_dynamic->name }}</small>
    <a class="small" target="_blank" href="{{ route('dynamic', [$game_dynamic_user->game_dynamic->slug, $game_dynamic_user->game_dynamic->id]) }}">Ver Link</a>
    <br>
    <strong>Puntos a ganar: </strong>
    <small>{{ $game_dynamic_user->game_dynamic->points }}</small>
    <br>
    @if (!is_null($game_dynamic_user->file))
        <strong>Archivo subido: </strong>
        <a href="{{ asset('images/dynamics/'.$game_dynamic_user->file) }}" class="small" target="_blank">Ver archivo</a>
        <br>
    @endif
    <strong>Fecha de creación: </strong>
    <small>{{ \Carbon\Carbon::parse($game_dynamic_user->created_at)->format('d/m/Y H:i:s') }}</small>
    <br>
    <strong>Estado: </strong>
    <small>@if($game_dynamic_user->validate == -1) Rechazado @endif @if($game_dynamic_user->validate == 0) Pendiente @endif @if($game_dynamic_user->validate == 1) Validado @endif</small>
    <hr>
  </p>
</div>

<div class="form-group col-sm-3">
  {{ Form::label('validate', 'Validar participación:', ['class' => 'font-weight-bold']) }} <code>*</code>
  {{ Form::select('validate', [-1 => 'Rechazar', 1 => 'Aprobar'], null, ['class' => 'custom-select', 'placeholder' => 'Validar participación', 'required']) }}
</div>
<div class="col-md-9"></div>