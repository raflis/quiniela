{{ Form::hidden('role', 1) }}

<div class="form-group col-sm-3">
  {{ Form::label('name', 'Nombre:') }} <code>*</code>
  {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
</div>

<div class="form-group col-sm-3">
  {{ Form::label('lastname', 'Apellido:') }} <code>*</code>
  {{ Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Apellido', 'required']) }}
</div>

<div class="form-group col-md-3">
  {{ Form::label('country', 'País:') }} <code>*</code>
  {{ Form::select('country', countries(), null, ['class' => 'custom-select', 'placeholder' => 'Selecciona un país', 'required']) }}
</div>

<div class="form-group col-md-3">
  {{ Form::label('birthday', 'Fecha de Nacimiento:') }} <code>*</code>
  {{ Form::date('birthday', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group col-sm-3">
  {{ Form::label('email', 'Email:') }} <code>*</code>
  {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) }}
</div>

<div class="form-group col-sm-3">
  {{ Form::label('position', 'Profesión:') }} <code>*</code>
  {{ Form::text('position', null, ['class' => 'form-control', 'placeholder' => 'Profesión', 'required']) }}
</div>

@if(Route::currentRouteName() == "users.create")
<div class="form-group col-md-6">
  <label class="input-label" for="">Contraseña</label> <code>*</code>
  <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
</div>
@endif
@if(Route::currentRouteName() == "users.edit")
<div class="form-group col-md-6">
  <label class="input-label" for="">Contraseña</label>
  <input type="password" class="form-control" name="newpassword" placeholder="Contraseña">
</div>
@endif