@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid profile">
        <div class="row show-header">
            <div class="col-sm-12">
                <h1>
                    <i class="fas fa-home fa-xs"></i> <span>Nosotros</span>
                </h1>
            </div>
        </div>
        <div class="row show-content mt-3">
            <div class="col-sm-12 col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                          Nosotros
                        </span>
                    </div>
                    {!! Form::model($pagefield, ['route' => ['pagefields.update', 1], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) !!}
                    <div class="card-body row">
                        <div class="col-sm-12">
                            @include('admin.includes.alert')
                        </div>

                        <div class="form-group col-sm-3">
                          {{ Form::label('aboutus_title1', 'Título 1:') }} <code>*</code>
                          {{ Form::text('aboutus_title1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título 1', 'required']) }}
                        </div>

                        <div class="form-group col-sm-3">
                          {{ Form::label('aboutus_title2', 'Título 2:') }} <code>*</code>
                          {{ Form::text('aboutus_title2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título 2', 'required']) }}
                        </div>
                        
                        <div class="form-group col-sm-3">
                          {!! Form::label('aboutus_background','Image de fondo:',['class'=>'']) !!} <strong>(1920 x 660px)</strong> <code>*</code>
                          <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm0" data-input="thumbnail0" data-preview="holder0" class="btn btn-primary text-white">
                                <i class="far fa-image"></i> Elegir
                                </a>
                            </span>
                            {!! Form::text('aboutus_background', null, ['class'=>'form-control','id'=>'thumbnail0']) !!}
                          </div>
                          <div id="holder0" style="margin-top:15px;max-height:100px;">
                            <img src="{{ $pagefield->aboutus_background }}" alt="" style="height:5rem">
                          </div>
                        </div>

                        <div class="form-group col-sm-3">
                          {{ Form::label('aboutus_title3', 'Título 3:') }} <code>*</code>
                          {{ Form::text('aboutus_title3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título 3', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('aboutus_text', 'Institución Descripción:') }} <code>*</code>
                          {{ Form::textarea('aboutus_text', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Descripción', 'rows' => 3, 'required' => true]) }}
                        </div>
                      
                        <div class="px-3 col-sm-12 mb-3">
                          <div class="card shadow col-sm-12 px-0">
                            <div class="card-header py-3 card-into">
                              <h6 class="m-0 font-weight-bold text-primary float-left">Imágenes:</h6>
                              <p class="btn btn-success btn-icon-split float-right añadir">
                                <span class="icon text-white-50">
                                  <i class="fas fa-plus"></i>
                                </span>
                                <span class="text text-white">Añadir</span>
                              </p>
                            </div>
                            <div class="texto row px-3">
                              @foreach ($pagefield->aboutus_images as $item)
                              @php $var_col = (count($pagefield->home_items)>1)?'col-md-6':'col-md-12'; @endphp
                              <div class="card-body {{ $var_col }}">
                                @if ($loop->index >= 0)
                                <a href="#" class="btn btn-danger btn-circle btn-sm float-right mb-2 eliminar">
                                  <i class="fas fa-trash"></i>
                                </a>
                                @endif
                                {!! Form::label('aboutus_images','Selecciona una imagen:', ['class' => '']) !!} <small><strong>(693 x 323px)</strong></small> <code>*</code>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm_aboutus{{ $loop->iteration }}" data-input="aboutus_images{{ $loop->iteration }}" data-preview="holder_aboutus{{ $loop->iteration }}" class="btn btn-primary text-white">
                                        <i class="far fa-image"></i> Elegir
                                        </a>
                                    </span>
                                    {!! Form::text('aboutus_images['.$loop->iteration.'][image]', $item['image'], ['class' => 'form-control', 'id' => 'aboutus_images'.$loop->iteration, 'required']) !!}
                                </div>
                                <div id="holder_aboutus{{ $loop->iteration }}" style="margin-top:15px;max-height:100px;">
                                    <img src="{{ $item['image'] }}" alt="" style="height:5rem">
                                </div>
                                {!! Form::label('aboutus_images','Orden:',['class' => '']) !!} <code>*</code>
                                {!! Form::number('aboutus_images['.$loop->iteration.'][order]', $item["order"], ['class' => 'form-control', 'required']) !!}
                                <hr class="mx-0 mt-4 border-bottom-dark" style="border:1px solid;background:#000">
                              </div>
                              @endforeach
                            </div>
                          </div>
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('history_title', 'Título 4:') }} <code>*</code>
                          {{ Form::text('history_title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título 4', 'required']) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('history_text', 'Historia:') }} <code>*</code>
                          {{ Form::textarea('history_text', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Historia', 'rows' => 3, 'required' => true]) }}
                        </div>

                        <div class="form-group col-sm-6">
                          {{ Form::label('aboutus_mission', 'Misión:') }} <code>*</code>
                          {{ Form::textarea('aboutus_mission', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Misión', 'rows' => 3, 'required' => true]) }}
                        </div>

                        <div class="form-group col-sm-6">
                          {{ Form::label('aboutus_vision', 'Visión:') }} <code>*</code>
                          {{ Form::textarea('aboutus_vision', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Visión', 'rows' => 3, 'required' => true]) }}
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 my-4 px-0">
                    {!! Form::submit('Actualizar cambios',['class'=>'btn btn-success btn-sm py-2 px-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
	$(document).ready(function(){
		 
		var i={{ count(($pagefield->aboutus_images))+1 }};

		$('.añadir').on('click',function(e){
			e.preventDefault();
			var template='<div class="col-md-6"><div class="card-body pt-0">' +
							'<a href="#" class="btn btn-danger btn-circle btn-sm float-right mb-2 eliminar">' +
								'<i class="fas fa-trash"></i>' +
							'</a>' +

                '<label for="aboutus_images" class="">Selecciona una imagen:</label> <small><strong>(693 x 323px)</strong></small> <code>*</code>' +
                '<div class="input-group">' +
                  '<span class="input-group-btn">' +
                      '<a id="lfm_aboutus'+i+'" data-input="aboutus_images'+i+'" data-preview="holder_aboutus'+i+'" class="btn btn-primary text-white">' +
                      '<i class="far fa-image"></i> Elegir' +
                      '</a>' +
                  '</span>' +
                  '<input class="form-control" id="aboutus_images'+i+'" name="aboutus_images['+i+'][image]" type="text" required>' +
                '</div>' +
                '<div id="holder_aboutus'+i+'" style="margin-top:15px;max-height:100px;"></div>' +
                
								'<label for="aboutus_images" class="">Orden:</label> <code>*</code>' +
								'<input class="form-control" name="aboutus_images['+i+'][order]" type="number" required>' +
                
							'<hr class="mx-0 mt-4 border-bottom-dark" style="border:1px solid;background:#000">' + 
						'</div></div>' +
            '<\script>$(\'#lfm_aboutus'+i+'\').filemanager(\'image\', {prefix: route_prefix});<\/script>';
	
			$('.texto').append(template);
			i++;
		});
	
		$(document).on('click','.eliminar',function(e){
			e.preventDefault();
			
			$(this).parent('.card-body').remove();
		});

   
	});
</script>
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
    @foreach ($pagefield->aboutus_images as $item)
    $('#lfm_aboutus{{ $loop->iteration }}').filemanager('image', {prefix: route_prefix});
    @endforeach

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