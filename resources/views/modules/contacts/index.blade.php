@extends('layouts/main')
@section('title', 'Contactos')
@section('header')
<h1>Contactos</h1>
@endsection
@section('content')
        @include('layouts.menu')
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse($items as $contact)
                    <tr>
                        <td>{{ $contact->cedula }}</td>
                        <td>{{ $contact->nombre }}</td>
                        <td>{{ $contact->apellido }}</td>
                        <td>
                            <form action="" method="post">
                                <a href="" role="button" class="btn btn-info">Mostrar</a>
                                <a href="" role="button" class="btn btn-warning">Editar</a>
                                <button type="button" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td> No hay contactos.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        
        <div class="pagination">
            {{ $items->links() }}
        </div>
@endsection