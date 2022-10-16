@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid profile">
        <div class="row show-header">
            <div class="col-sm-12">
                <h1>
                    <i class="fas fa-home fa-xs"></i> <span>Inicio</span>
                </h1>
            </div>
        </div>
        <div class="row show-content mt-3">
            <div class="col-sm-12 col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                            Inicio
                        </span>
                    </div>
                    {!! Form::model($pagefield, ['route' => ['pagefields.update', 1], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) !!}
                    <div class="card-body row">
                        <div class="col-sm-12">
                            @include('admin.includes.alert')
                        </div>
                        <div class="form-group col-sm-12">
                          {{ Form::label('home_title', 'Título:') }} <code>*</code>
                          {{ Form::text('home_title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título', 'required']) }}
                        </div>
                        <div class="form-group col-sm-12">
                            {{ Form::label('home_text', 'Descripción:') }} <code>*</code>
                            {{ Form::textarea('home_text', null, ['class' => 'form-control', 'placeholder' => 'Descripción', 'rows' => 3, 'required' => true]) }}
                        </div>

                        <div class="form-group col-sm-12">
                          {{ Form::label('home_description', 'Detalle:') }} <code>*</code>
                          {{ Form::textarea('home_description', null, ['class' => 'form-control', 'placeholder' => 'Detalle', 'rows' => 3, 'required' => true]) }}
                      </div>

                        <div class="form-group col-sm-12">
                          {!! Form::label('home_image','Image logo Puquina:',['class'=>'']) !!} <strong>(226 x 239px)</strong> <code>*</code>
                          <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm0" data-input="thumbnail0" data-preview="holder0" class="btn btn-primary text-white">
                                <i class="far fa-image"></i> Elegir
                                </a>
                            </span>
                            {!! Form::text('home_image', null, ['class'=>'form-control','id'=>'thumbnail0']) !!}
                          </div>
                          <div id="holder0" style="margin-top:15px;max-height:100px;">
                            <img src="{{ $pagefield->home_image }}" alt="" style="height:5rem">
                          </div>
                        </div>

                        <div class="px-3 col-sm-12 mb-3">
                          <div class="card shadow col-sm-12 px-0">
                            <div class="card-header py-3 card-into">
                              <h6 class="m-0 font-weight-bold text-primary float-left">Beneficios:</h6>
                              <p class="btn btn-success btn-icon-split float-right añadir">
                                <span class="icon text-white-50">
                                  <i class="fas fa-plus"></i>
                                </span>
                                <span class="text text-white">Añadir</span>
                              </p>
                            </div>
                            <div class="texto row px-3">
                              @foreach ($pagefield->home_items as $item)
                              @php $var_col = (count($pagefield->home_items)>1)?'col-md-6':'col-md-12'; @endphp
                              <div class="card-body {{ $var_col }}">
                                @if ($loop->index >= 0)
                                <a href="#" class="btn btn-danger btn-circle btn-sm float-right mb-2 eliminar">
                                  <i class="fas fa-trash"></i>
                                </a>
                                @endif
                                {!! Form::label('home_items','Selecciona una imagen:',['class'=>'']) !!} <small><strong>(Alto 40px)</strong></small> <code>*</code>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm_home{{ $loop->iteration }}" data-input="home_items{{ $loop->iteration }}" data-preview="holder_home{{ $loop->iteration }}" class="btn btn-primary text-white">
                                        <i class="far fa-image"></i> Elegir
                                        </a>
                                    </span>
                                    {!! Form::text('home_items['.$loop->iteration.'][image]',$item['image'],['class'=>'form-control','id'=>'home_items'.$loop->iteration,'required']) !!}
                                </div>
                                <div id="holder_home{{ $loop->iteration }}" style="margin-top:15px;max-height:100px;">
                                    <img src="{{ $item['image'] }}" alt="" style="height:5rem">
                                </div>
                                {!! Form::label('home_items','Nombre:',['class'=>'mt-3']) !!} <code>*</code>
                                {!! Form::text('home_items['.$loop->iteration.'][name]',$item["name"],['class'=>'form-control','required']) !!}
                                {!! Form::label('home_items','Detalle:',['class'=>'mt-3']) !!} <code>*</code>
                                {!! Form::textarea('home_items['.$loop->iteration.'][detail]',$item["detail"],['class'=>'form-control','required', 'rows' => 3, 'required']) !!}
                                {!! Form::label('home_items','Orden:',['class'=>'mt-3']) !!} <code>*</code>
                                {!! Form::number('home_items['.$loop->iteration.'][order]',$item["order"],['class'=>'form-control','required']) !!}
                                <hr class="mx-0 mt-4 border-bottom-dark" style="border:1px solid;background:#000">
                              </div>
                              @endforeach
                            </div>
                          </div>
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
		 
		var i={{ count(($pagefield->home_items))+1 }};

		$('.añadir').on('click',function(e){
			e.preventDefault();
			var template='<div class="col-md-6"><div class="card-body pt-0">' +
							'<a href="#" class="btn btn-danger btn-circle btn-sm float-right mb-2 eliminar">' +
								'<i class="fas fa-trash"></i>' +
							'</a>' +

                '<label for="home_items" class="">Selecciona una imagen:</label> <small><strong>(Alto 40px)</strong></small> <code>*</code>' +
                '<div class="input-group">' +
                  '<span class="input-group-btn">' +
                      '<a id="lfm_home'+i+'" data-input="home_items'+i+'" data-preview="holder_home'+i+'" class="btn btn-primary text-white">' +
                      '<i class="far fa-image"></i> Elegir' +
                      '</a>' +
                  '</span>' +
                  '<input class="form-control" id="home_items'+i+'" name="home_items['+i+'][image]" type="text" required>' +
                '</div>' +
                '<div id="holder_home'+i+'" style="margin-top:15px;max-height:100px;"></div>' +
                
                '<label for="home_items" class="mt-3">Nombre:</label> <code>*</code>' +
								'<input class="form-control" name="home_items['+i+'][name]" type="text" required>' +
                '<label for="home_items" class="mt-3">Detalle:</label> <code>*</code>' +
								'<textarea class="form-control" name="home_items['+i+'][detail]" placeholder="Detalle" rows="3" id="hola" required></textarea>' +
								'<label for="home_items" class="mt-3">Orden:</label> <code>*</code>' +
								'<input class="form-control" name="home_items['+i+'][order]" type="number" required>' +
                
							'<hr class="mx-0 mt-4 border-bottom-dark" style="border:1px solid;background:#000">' + 
						'</div></div>' +
            '<\script>$(\'#lfm_home'+i+'\').filemanager(\'image\', {prefix: route_prefix});<\/script>';
	
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
    @foreach ($pagefield->home_items as $item)
    $('#lfm_home{{ $loop->iteration }}').filemanager('image', {prefix: route_prefix});
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