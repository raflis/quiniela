<div class="form-group col-sm-4">
  {{ Form::label('team1_id', 'Equipo 1:') }} <code>*</code>
  {{ Form::select('team1_id', $teams, null, ['class' => 'custom-select', 'placeholder' => 'Seleccione un equipo', 'required']) }}
</div>

<div class="form-group col-sm-4">
  {{ Form::label('team2_id', 'Equipo 2:') }} <code>*</code>
  {{ Form::select('team2_id', $teams, null, ['class' => 'custom-select', 'placeholder' => 'Seleccione un equipo', 'required']) }}
</div>

<div class="form-group col-sm-4">
  {{ Form::label('match_date', 'Día y hora del partido:') }} <code>*</code>
  {{ Form::datetimeLocal('match_date', null, ['class' => 'form-control', 'placeholder' => 'Día y hora del partido', 'required']) }}
</div>

@if (Route::currentRouteName()=="games.edit")
<div class="form-group col-sm-4">
  {{ Form::label('score1', 'Resultado Equipo 1:') }} <code>*</code>
  {{ Form::number('score1', null, ['class' => 'form-control', 'placeholder' => 'Resultado equipo 1', 'required', 'min' => 0]) }}
  <div class="invalid-feedback">
    Ingrese un resultado
  </div>
</div>

<div class="form-group col-sm-4">
  {{ Form::label('score2', 'Resultado Equipo 2:') }} <code>*</code>
  {{ Form::number('score2', null, ['class' => 'form-control', 'placeholder' => 'Resultado equipo 2', 'required', 'min' => 0]) }}
  <div class="invalid-feedback">
    Ingrese un resultado
  </div>
</div>

<div class="form-group col-sm-4">
  {{ Form::label('game_over', '¿Finalizó el partido?:') }} <code>*</code>
  {{ Form::select('game_over', [0 => 'No', 1 => 'Si'], null, ['class' => 'custom-select', 'placeholder' => 'Selecciona', 'required']) }}
  <div class="invalid-feedback">
    Ingrese un resultado
  </div>
</div>
@endif