@extends('layouts/main')
@section('title', 'Actualizar Contacto')
@section('header')
<h1>Contacto : {{$contact->cedula}}</h1>
@endsection
@section('content')
        @include('layouts.menu')
        <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Actualizar información del Contacto</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('update', $contact->id) }}" method="POST" class="row g-3" id="form-update">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="cedula" class="form-label fw-bold">Cédula</label>
                    <input type="text" name="cedula" id="cedula" class="form-control" value={{ $contact->cedula }}>
                </div>

                <div class="col-md-6">
                    <label for="nombre" class="form-label fw-bold">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value={{ $contact->nombre }}>
                </div>

                <div class="col-md-6">
                    <label for="apellido" class="form-label fw-bold">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" value={{ $contact->apellido }}>
                </div>

                <div class="col-md-6">
                    <label for="edad" class="form-label fw-bold">Edad</label>
                    <input type="number" name="edad" id="edad" class="form-control" value={{ $contact->edad }} >
                </div>

                <div class="col-md-6">
                    <label for="genero" class="form-label fw-bold">Género</label>
                    <select id="genero" class="form-select" name="genero">
                        @foreach(['femenino', 'masculino', 'otros'] as $opcion)
                            <option value="{{ $opcion }}" @selected($contact->genero == $opcion)>
                                {{ ucfirst($opcion) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="telefono" class="form-label fw-bold" >Teléfono (Formato: 0000-0000000)</label>
                    <input type="text" id="telefono" class="form-control" name="telefono" value={{ $contact->telefono }}>
                </div>

                <div class="col-md-6">
                    <label for="correo" class="form-label fw-bold" >Correo Electrónico</label>
                    <input type="email" id="correo" class="form-control" name="correo" value={{ $contact->correo }}>
                </div>

                <div class="col-md-6">
                    <label for="estado_civil" class="form-label fw-bold">Estado Civil</label>
                    <select id="estado_civil" class="form-select" name="estado_civil">
                        @foreach(['soltero', 'casado', 'divorciado', 'concubinato', 'viudo'] as $opcion)
                            <option value="{{ $opcion }}" @selected($contact->estado_civil == $opcion)>
                                {{ ucfirst($opcion) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="direccion" class="form-label fw-bold">Dirección</label>
                    <textarea id="direccion" class="form-control" rows="2" name="direccion" >{{ $contact->direccion }}</textarea>
                </div>

                <div class="col-md-6">
                    <label for="departamento" class="form-label fw-bold">Departamento</label>
                    <input type="text" id="departamento" class="form-control" name="departamento" value= {{ $contact->departamento }}>
                </div>

                <div class="col-md-6">
                    <label for="cargo" class="form-label fw-bold">Cargo</label>
                    <input type="text" id="cargo" class="form-control" name="cargo" value="{{ $contact->cargo }}">
                </div>
                
            </form>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li >{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-warning" form="form-update">Actualizar Contacto</button>
            <a href="{{ route('index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection