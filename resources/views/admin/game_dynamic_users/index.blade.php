@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid">
        <div class="row layout-header">
            <div class="col-sm-12 header-content">
                <h1>
                    <i class="fas fa-bullhorn fa-xs text-white2"></i> Participantes dinámicas
                </h1>
                <span class="subtitle">
                    Editar y eliminar.
                </span>
            </div>
        </div>
        <div class="row layout-body">
            <div class="col-sm-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                            Participantes dinámicas
                        </span>
                    </div>
                    <div class="px-3">
                        @include('admin.includes.alert')
                    </div>
                </div>
                <div class="tablaTotal">
                    <table class="table tableD">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Usuario</th>
                                <th>Dinámica</th>
                                <th>Puntos a ganar</th>
                                <th>Archivo</th>
                                <th>Fecha de creación</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($game_dynamic_users as $item)
                            <tr>
                                <td>{{ $game_dynamic_users->firstItem() + $loop->index }}</td>
                                <td class="d-flex">
                                    <img src="{{ asset('images/profiles/'.$item->user->avatar) }}" alt="" height=40> 
                                    {{ $item->user->name }} {{ $item->user->lastname }}
                                </td>
                                <td>{{ $item->game_dynamic->name }} <a target="_blank" href="{{ route('dynamic', [$item->game_dynamic->slug, $item->game_dynamic->id]) }}">Ver Link</a></td>
                                <td>{{ $item->game_dynamic->points }}</td>
                                <td><a target="_blank" href="{{ asset('images/dynamics/'.$item->file) }}">Ver archivo</a></td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i:s') }}</td>
                                <td>@if($item->validate == -1) Rechazado @endif @if($item->validate == 0) Pendiente @endif @if($item->validate == 1) Validado @endif</td>
                                <td>
                                    <div style="display: inline-flex">
                                        @if($item->validate == 0)
                                        <a class="btn btn-primary text-white btn-sm mr-1" href="{{ route('game_dynamic_users.edit', $item->id) }}">
                                            <i class="far fa-edit pr-1"></i> Validar
                                        </a>
                                        @endif
                                        <a class="btn btn-danger btn-sm btn-eliminar" href="" ideliminar="{{ $item->id }}"><i class="far fa-trash-alt pr-1"></i> Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginacionTotal d-flex justify-content-end">
                    {{ $game_dynamic_users->withQueryString()->render() }}
                </div>
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
</div>

<div class="modal fade" id="deleting" tabindex="-1" role="dialog" aria-labelledby="deletingLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fas fa-exclamation-circle fa-5x text-warning mb-3"></i>
            <p class="mb-0 font-bold first">¿Estás seguro?</p>
            <p class="mb-0 font-light second">El registro seleccionado será eliminado y no podrá recuperarse.</p>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            {!! Form::open(['route' => ['game_dynamic_users.destroy', ''], 'method' => 'DELETE', 'id' => 'form-eliminar']) !!}
                <button class="btn btn-danger">
                    Sí, eliminar
                </button>                           
            {!! Form::close() !!}
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')

<script>
$('document').ready(function(){
    $('.btn-eliminar').click(function(e){
        e.preventDefault();
        var id = $(this).attr('ideliminar');
        var base = '{{ route('game_dynamic_users.destroy', '') }}';
        var url = base + '/' +id;
        $('#form-eliminar').attr('action', url);
        $('#deleting').modal('show');
    });
})
</script>

@endsection