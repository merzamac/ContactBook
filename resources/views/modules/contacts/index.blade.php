@extends('layouts/main')

@section('content')
    <div class="container mt-4">
        <h2>CRUD Contacts</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                <div class="card-body">
                    <a href="{{ route('create') }}" class="btn btn-primary">Agregar</a>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection