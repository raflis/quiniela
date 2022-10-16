{{ Form::hidden('country', 'Perú') }}
{{ Form::hidden('role', 1) }}
{{ Form::hidden('information', 1) }}
{{ Form::hidden('membership', 'pending') }}

<div class="form-group col-sm-3">
  {{ Form::label('name', 'Nombre:') }} <code>*</code>
  {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) }}
</div>

<div class="form-group col-sm-3">
  {{ Form::label('lastname', 'Apellido:') }} <code>*</code>
  {{ Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Apellido', 'required']) }}
</div>

<div class="form-group col-md-3">
  {{ Form::label('type_document', 'Tipo de Documento:') }} <code>*</code>
  {{ Form::select('type_document', $type_document, null, ['class' => 'custom-select', 'required']) }}
</div>

<div class="form-group col-md-3">
  {{ Form::label('document', 'Documento:') }} <code>*</code>
  {{ Form::text('document', null, ['class' => 'form-control', 'placeholder' => 'Ej: 12345678', 'required']) }}
</div>

<div class="form-group col-md-3">
  {{ Form::label('birthday', 'Fecha de Nacimiento:') }} <code>*</code>
  {{ Form::date('birthday', null, ['class' => 'form-control', 'required']) }}
</div>

<div class="form-group col-md-3">
  {{ Form::label('gender', 'Sexo:') }} <code>*</code>
  {{ Form::select('gender', $genders, null, ['class' => 'custom-select', 'required']) }}
</div>

<div class="form-group col-md-2">
  <label for="">Departamento Nac.</label> <code>*</code>
  <select name="birth_department" id="birth_department" class="custom-select" required>
      <option value="">Departamento</option>
      @foreach ($departments as $department)
          <option value="{{ $department->id }}" @if (Route::currentRouteName()=="users.edit") {{ ($department->id == $user->birth_department)?'selected':'' }} @endif>{{ $department->name }}</option>
      @endforeach
  </select>
</div>

<div class="form-group col-md-2">
  <label for="">Provincia Nac.</label> <code>*</code>
  <select name="birth_province" id="birth_province" class="custom-select" required>
      <option value="">Provincia</option>
  </select>
</div>

<div class="form-group col-md-2">
  <label for="">Distrito Nac.</label> <code>*</code>
  <select name="birth_district" id="birth_district" class="custom-select" required>
      <option value="">Distrito</option>
  </select>
</div>

<div class="form-group col-md-3">
  <label for="">Departamento Actual</label> <code>*</code>
  <select name="department" id="department" class="custom-select" required>
      <option value="">Departamento</option>
      @foreach ($departments as $department)
          <option value="{{ $department->id }}" @if (Route::currentRouteName()=="users.edit") {{ ($department->id == $user->department)?'selected':'' }} @endif>{{ $department->name }}</option>
      @endforeach
  </select>
</div>

<div class="form-group col-md-3">
  <label for="">Provincia Actual</label> <code>*</code>
  <select name="province" id="province" class="custom-select" required>
      <option value="">Provincia</option>
  </select>
</div>

<div class="form-group col-md-3">
  <label for="">Distrito Actual</label> <code>*</code>
  <select name="district" id="district" class="custom-select" required>
      <option value="">Distrito</option>
  </select>
</div>

<div class="form-group col-sm-3">
  {{ Form::label('address', 'Dirección:') }} <code>*</code>
  {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'required']) }}
</div>

<div class="form-group col-sm-3">
  {{ Form::label('email', 'Email:') }}
  {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
</div>

<div class="form-group col-sm-3">
  {{ Form::label('landline', 'Teléfono fijo:') }}
  {{ Form::text('landline', null, ['class' => 'form-control', 'placeholder' => 'Teléfono fijo']) }}
</div>

<div class="form-group col-sm-3">
  {{ Form::label('telephone', 'Celular:') }}
  {{ Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => 'Celular']) }}
</div>

<div class="form-group col-sm-3">
  {{ Form::label('profession', 'Profesión:') }}
  {{ Form::text('profession', null, ['class' => 'form-control', 'placeholder' => 'Profesión']) }}
</div>

<div class="form-group col-md-6">
  {{ Form::label('partner_type', 'Tipo de socio:') }} <code>*</code>
  {{ Form::select('partner_type', $partner_type, null, ['class' => 'custom-select', 'required']) }}
</div>

<div class="form-group col-md-6">
  <label class="input-label" for="">Contraseña</label>
  <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
</div>


@section('script')

<script>

var base = location.protocol+'//'+location.host;

$(function($){
  $('#department').on('change', function(e){
      e.preventDefault();
      var id_department = $(this).val().split('_');
      id_department = id_department[0];
      $.ajax({
          type: "POST",
          url: base + '/admin/provinces',
          data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              id: id_department,
          },
          //dataType: 'json',
          success: function success(response) {
              if (response.length > 0) {
                  var options = '<option value="" disabled selected>Provincia</option>';

                  for (var r = 0; r < response.length; r++) {
                      options += '<option value="' + response[r].id + '">' + response[r].name + '</option>';
                  }

                  $('#province').html(options);
                  $('#district').html('<option value="" disabled selected>Distrito</option>');
              }
          },
          beforeSend: function beforeSend() {
              var option = '<option value="" disabled selected>Cargando ...</option>';
              $('#province').html(option);
              $('#district').html(option);
          },
          error: function error(_error3, e) {
              console.log(_error3);
              console.log(e);
          }
      });
  });

  $('#province').on('change', function(e){
      e.preventDefault();
      var id_province = $(this).val().split('_');
      id_province = id_province[0];
      $.ajax({
          type: "POST",
          url: base + '/admin/districts',
          data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              id: id_province,
          },
          //dataType: 'json',
          success: function success(response) {
              if (response.length > 0) {
                  var options = '<option value="" disabled selected>Distrito</option>';

                  for (var r = 0; r < response.length; r++) {
                      options += '<option value="' + response[r].id + '">' + response[r].name + '</option>';
                  }

                  $('#district').html(options);
              }
          },
          beforeSend: function beforeSend() {
              var option = '<option value="" disabled selected>Cargando ...</option>';
              $('#district').html(option);
          },
          error: function error(_error3, e) {
              console.log(_error3);
              console.log(e);
          }
      });
  });
  $('#birth_department').on('change', function(e){
      e.preventDefault();
      var id_department = $(this).val().split('_');
      id_department = id_department[0];
      $.ajax({
          type: "POST",
          url: base + '/admin/provinces',
          data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              id: id_department,
          },
          //dataType: 'json',
          success: function success(response) {
              if (response.length > 0) {
                  var options = '<option value="" disabled selected>Provincia</option>';

                  for (var r = 0; r < response.length; r++) {
                      options += '<option value="' + response[r].id + '">' + response[r].name + '</option>';
                  }

                  $('#birth_province').html(options);
                  $('#birth_district').html('<option value="" disabled selected>Distrito</option>');
              }
          },
          beforeSend: function beforeSend() {
              var option = '<option value="" disabled selected>Cargando ...</option>';
              $('#birth_province').html(option);
              $('#birth_district').html(option);
          },
          error: function error(_error3, e) {
              console.log(_error3);
              console.log(e);
          }
      });
  });

  $('#birth_province').on('change', function(e){
      e.preventDefault();
      var id_province = $(this).val().split('_');
      id_province = id_province[0];
      $.ajax({
          type: "POST",
          url: base + '/admin/districts',
          data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              id: id_province,
          },
          //dataType: 'json',
          success: function success(response) {
              if (response.length > 0) {
                  var options = '<option value="" disabled selected>Distrito</option>';

                  for (var r = 0; r < response.length; r++) {
                      options += '<option value="' + response[r].id + '">' + response[r].name + '</option>';
                  }

                  $('#birth_district').html(options);
              }
          },
          beforeSend: function beforeSend() {
              var option = '<option value="" disabled selected>Cargando ...</option>';
              $('#birth_district').html(option);
          },
          error: function error(_error3, e) {
              console.log(_error3);
              console.log(e);
          }
      });
  });

  @if (Route::currentRouteName()=="users.edit")
    @if($user->birth_department != '')
      let timerBirthDepartment = setInterval(function(e) {
          if($('#birth_department option').length > 1){
              $('#birth_department').val('{{ $user->birth_department }}').trigger('change');
              clearInterval(timerBirthDepartment);
          }
      }, 100);
    @endif

    @if($user->birth_province != '')
      let timerBirthProvince = setInterval(function(e) {
          if($('#birth_province option').length > 1){
              $('#birth_province').val('{{ $user->birth_province }}').trigger('change');
              clearInterval(timerBirthProvince);
          }
      }, 100);
    @endif

    @if($user->birth_district != '')
      let timerBirthDistrict = setInterval(function(e) {
          if($('#birth_district option').length > 1){
              $('#birth_district').val('{{ $user->birth_district }}').trigger('change');
              clearInterval(timerBirthDistrict);
          }
      }, 100);
    @endif

    @if($user->department != '')
      let timerDepartment = setInterval(function(e) {
          if($('#department option').length > 1){
              $('#department').val('{{ $user->department }}').trigger('change');
              clearInterval(timerDepartment);
          }
      }, 100);
    @endif

    @if($user->province != '')
      let timerProvince = setInterval(function(e) {
          if($('#province option').length > 1){
              $('#province').val('{{ $user->province }}').trigger('change');
              clearInterval(timerProvince);
          }
      }, 100);
    @endif

    @if($user->district != '')
      let timerDistrict = setInterval(function(e) {
          if($('#district option').length > 1){
              $('#district').val('{{ $user->district }}').trigger('change');
              clearInterval(timerDistrict);
          }
      }, 100);
    @endif
  @endif

})

</script>

@endsection