@extends('layouts/main')

@section('content')
    <div >
        <h2>CRUD Contacts</h2>
        <a href="{{ route('create') }}" class="btn btn-secundary mt-20">Agregar</a>
    </div>
@endsection