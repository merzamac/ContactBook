@extends('layouts/main')
@section('title', 'Agregar Contacto')
@section('header')
<h2>Agregar Contacto</h2>
@endsection
@section('content')
@include('layouts.menu')

        <form action="{{ route('store') }}" method="POST" id="form-dinamico" class="mt-5">
            @csrf
            @method('POST')  
            <div id="contenedor-flex" class="flex-form row">
                        {{-- Aquí se cargarán los campos mediante app.js --}}
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Agregar Contacto</button>
                <a href="{{ route('index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>

@endsection   
@push('scripts')
<script src="{{ asset('js/create.js') }}"></script>
@endpush


