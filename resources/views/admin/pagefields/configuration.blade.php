@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid profile">
        <div class="row show-header">
            <div class="col-sm-12">
                <h1>
                    <i class="fas fa-home fa-xs"></i> <span>Configuración</span>
                </h1>
            </div>
        </div>
        <div class="row show-content mt-3">
            <div class="col-sm-12 col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                          Configuración
                        </span>
                    </div>
                    {!! Form::model($pagefield, ['route' => ['pagefields.update', 1], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) !!}
                    <div class="card-body row">
                        <div class="col-sm-12">
                            @include('admin.includes.alert')
                        </div>

                        <div class="form-group col-sm-12">
                            {!! Form::label('logo', 'Logo:', ['class' => '']) !!} <strong>(322px de alto)</strong> <code>*</code>
                            <div class="input-group">
                              <span class="input-group-btn">
                                  <a id="lfm0" data-input="thumbnail0" data-preview="holder0" class="btn btn-primary text-white">
                                  <i class="far fa-image"></i> Elegir
                                  </a>
                              </span>
                              {!! Form::text('logo', null, ['class' => 'form-control', 'id' => 'thumbnail0']) !!}
                            </div>
                            <div id="holder0" style="margin-top:15px;max-height:100px;">
                              <img src="{{ $pagefield->logo }}" alt="" style="height:5rem">
                            </div>
                          </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('footer_text', 'Texto del footer:') }}
                          {{ Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => 'Texto del footer',  'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('game_points', 'Puntos por acertar a los partidos:') }} <code>*</code>
                          {{ Form::number('game_points', null, ['class' => 'form-control', 'placeholder' => 'Puntos por acertar a los partidos', 'required', 'min' => 0]) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('end_phase16', 'Fin para predecir "Fase de grupos":') }} <code>*</code>
                          {{ Form::datetimeLocal('end_phase16', null, ['class' => 'form-control', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('end_phase8', 'Fin para predecir "Octavos de final":') }} <code>*</code>
                          {{ Form::datetimeLocal('end_phase8', null, ['class' => 'form-control', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('end_phase4', 'Fin para predecir "Cuartos de final":') }} <code>*</code>
                          {{ Form::datetimeLocal('end_phase4', null, ['class' => 'form-control', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('end_phase2', 'Fin para predecir "Semifinales":') }} <code>*</code>
                          {{ Form::datetimeLocal('end_phase2', null, ['class' => 'form-control', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('end_phase3', 'Fin para predecir "Tercer lugar":') }} <code>*</code>
                          {{ Form::datetimeLocal('end_phase3', null, ['class' => 'form-control', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('end_phase1', 'Fin para predecir "Final":') }} <code>*</code>
                          {{ Form::datetimeLocal('end_phase1', null, ['class' => 'form-control', 'required']) }}
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 my-4 px-0">
                    {!! Form::submit('Actualizar cambios', ['class' => 'btn btn-success btn-sm py-2 px-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
  (function( $ ){

$.fn.filemanager = function(type, options) {
  type = type || 'file';

  this.on('click', function(e) {
    var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
    var target_input = $('#' + $(this).data('input'));
    var target_preview = $('#' + $(this).data('preview'));
    window.open(route_prefix + '?type=' + type, 'FileManager', 'width=1100,height=600');
    window.SetUrl = function (items) {
      var file_path = items.map(function (item) {
        return item.url;
      }).join(',');

      // set the value of the desired input to image url
      target_input.val('').val(file_path).trigger('change');

      // clear previous preview
      target_preview.html('');

      // set or change the preview image src
      items.forEach(function (item) {
        target_preview.append(
          $('<img>').css('height', '5rem').attr('src', item.thumb_url)
        );
      });

      // trigger change event
      target_preview.trigger('change');
    };
    return false;
  });
}

})(jQuery);

</script>
<script>
  $('#lfm0').filemanager('image', {prefix: route_prefix});
</script>

<script>
  var lfm = function(id, type, options) {
    let button = document.getElementById(id);

    button.addEventListener('click', function () {
      var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
      var target_input = document.getElementById(button.getAttribute('data-input'));
      var target_preview = document.getElementById(button.getAttribute('data-preview'));

      window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
      window.SetUrl = function (items) {
        var file_path = items.map(function (item) {
          return item.url;
        }).join(',');

        // set the value of the desired input to image url
        target_input.value = file_path;
        target_input.dispatchEvent(new Event('change'));

        // clear previous preview
        target_preview.innerHtml = '';

        // set or change the preview image src
        items.forEach(function (item) {
          let img = document.createElement('img')
          img.setAttribute('style', 'height: 5rem')
          img.setAttribute('src', item.thumb_url)
          target_preview.appendChild(img);
        });

        // trigger change event
        target_preview.dispatchEvent(new Event('change'));
      };
    });
  };

  //lfm('lfm2', 'file', {prefix: route_prefix});
</script>

@endsection