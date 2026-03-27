@extends('layouts/main')

@section('content')
    <div >
        <h2>CRUD Contacts</h2>
        <a href="{{ route('create') }}" class="btn btn-secundary mt-20">Agregar</a>
        
        <table class="contacts-table mt-20">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $contact)
                    <tr>
                        <td>{{ $contact->cedula }}</td>
                        <td>{{ $contact->nombre }}</td>
                        <td>{{ $contact->apellido }}</td>
                        <td>
                            <form action="" method="post">
                                <a href="" class="btn btn-secundary">Mostrar</a>
                                <a href="" class="btn btn-warning">Editar</a>
                                <button class="btn btn-danger">Eliminar</button>
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
        </div>
@endsection