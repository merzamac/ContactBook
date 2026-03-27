@extends('layouts/main')
@section('title', 'Agregar Contacto')
@section('content')
<div>
    <h2>Agregar Contacto</h2>
        <form action="{{ route('store') }}" method="POST" id="form-dinamico">
            @csrf
                    
            <div id="contenedor-flex" class="flex-form">
                        {{-- Aquí se cargarán los campos mediante app.js --}}
            </div>

            <div>
                <button type="submit" class="btn-submit btn">Agregar Contacto</button>
                <a href="{{ route('index') }}" class="btn btn-danger d-block mt-20">Cancelar</a>
            </div>
        </form>
</div>
@endsection   
@push('scripts')
<script src="{{ asset('js/create.js') }}"></script>
@endpush


