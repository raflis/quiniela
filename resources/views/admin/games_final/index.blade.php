@extends('admin.master')

@section('content')

<div class="layoutContent">
    <div class="container-fluid">
        <div class="row layout-header">
            <div class="col-sm-12 header-content">
                <h1>
                    <i class="fas fa-bullhorn fa-xs text-white2"></i> Partidos
                </h1>
                <span class="subtitle">
                    Editar score
                </span>
            </div>
        </div>
        <div class="row layout-body">
            <div class="col-sm-12">
                <div class="card shadow">
                    <div class="card-header">
                        <span>
                            Sliders
                        </span>
                        <a class="btn btn-success" href="{{ route('games_final.create') }}">
                            <span class="icon">
                                <i class="fas fa-plus px-2 py-1"></i>
                            </span>
                            <span class="text px-2 py-1">
                                Crear
                            </span>
                        </a>
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
                                <th>Equipo 1</th>
                                <th>Equipo 2</th>
                                <th>Fase</th>
                                <th>Fecha del partido</th>
                                <th>¿Finalizó el partido?</th>
                                <th>Resultado Equipo 1</th>
                                <th>Resultado Equipo 2</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($games as $item)
                            <tr>
                                <td>{{ $games->firstItem() + $loop->index }}</td>
                                <td>
                                    @if($item->team1->name == 'Por definirse')
                                    <img height="18" src="{{ asset('images/countries/default.png') }}" alt=""> {{ $item->team1->name }}
                                    @else
                                    <img height="18" src="{{ asset('images/countries/'.$item->team1->group.$item->team1->order.'.png') }}" alt=""> {{ $item->team1->name }}
                                    @endif
                                </td>
                                <td>
                                    @if($item->team2->name == 'Por definirse')
                                    <img height="18" src="{{ asset('images/countries/default.png') }}" alt=""> {{ $item->team2->name }}
                                    @else
                                    <img height="18" src="{{ asset('images/countries/'.$item->team2->group.$item->team2->order.'.png') }}" alt=""> {{ $item->team2->name }}
                                    @endif
                                </td>
                                <td>{{ $item->phase }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->match_date)->format('d/m/Y H:i:s') }}</td>
                                <td>{{ ($item->game_over == 0)?'Pendiente':'Finalizado' }}</td>
                                <td>{{ $item->score1 }}</td>
                                <td>{{ $item->score2 }}</td>
                                <td>
                                    <div style="display: inline-flex">
                                        <a class="btn btn-primary text-white btn-sm mr-1" href="{{ route('games_final.edit', $item->id) }}">
                                            <i class="far fa-edit pr-1"></i> Editar score
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginacionTotal d-flex justify-content-end">
                    {{ $games->withQueryString()->render() }}
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
            {!! Form::open(['route' => ['games_final.destroy', ''], 'method' => 'DELETE', 'id' => 'form-eliminar']) !!}
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
        var base = '{{ route('games_final.destroy', '') }}';
        var url = base + '/' +id;
        $('#form-eliminar').attr('action', url);
        $('#deleting').modal('show');
    });
})
</script>

@endsection