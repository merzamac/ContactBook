@extends('layouts/main')
@section('title', 'Agregar Contacto')
@section('header')
<h2>Agregar Contacto</h2>
@endsection
@section('content')
@include('layouts.menu')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Información del Contacto</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('store') }}" method="POST" id="form-dinamico" class="row g-3">
            @csrf
            @method('POST') 
        </form>
    </div>
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-success" >Agregar Contacto</button>
        <a href="{{ route('index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</div>
@endsection   
@push('scripts')
<script src="{{ asset('js/create.js') }}"></script>
@endpush