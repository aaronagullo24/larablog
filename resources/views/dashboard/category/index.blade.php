@extends('dashboard.category.master')

@section('content')

<a class="btn btn-success mt-3 mb-3" href="{{route('category.create')}}">
    Crear
</a>

<table class="table">
    <thead>
        <tr>
            <td>
                Identificador
            </td>
            <td>
                Titulo
            </td>
            
            <td>
                Creacion
            </td>
            <td>
                Actualizacion
            </td>
            <td>
                acciones
            </td>
        </tr>
    </thead>

    <tbody>

        @foreach ($categories as $category)
        <tr>
            <td>
                {{$category->id}}
            </td>
    
            <td>
                {{$category->title}}
            </td>
            <td>
                {{$category->created_at->format('d-m-y')}}
            </td>
            <td>
                {{$category->updated_at->format('d-m-y')}}
            </td>
            <td>
                <a href="{{ route('category.show',$category->id)}}" class="btn btn-primary">Ver</a>
                <a href="{{ route('category.edit',$category->id)}}" class="btn btn-primary">Actualizar</a>

                <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteModal"
                    data-id="{{ $category->id }}">Delete</button>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>

{{$categories->links()}}



<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Seguro que desea borrar el registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form id="formDelete" method="POST" action="{{ route('category.destroy',0)}}"
                    data-action="{{route('category.destroy',0)}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
   window.onload = function () {
        $('#deleteModal ').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            action = $('#formDelete').attr('data-action').slice(0, -1)
            action += id
            $('#formDelete').attr('action', action)
            console.log(action)
            var modal = $(this)
            modal.find('.modal-title').text('vas a borrar la categoria: ' + id)
        });
    };
</script>

@endsection