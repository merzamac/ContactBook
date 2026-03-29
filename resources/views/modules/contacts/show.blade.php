@extends('layouts/main')
@section('title', 'Mostrar Contactos')
@section('header')
<h1>Contacto : {{$contact->cedula}}</h1>
@endsection
@section('content')
        @include('layouts.menu')
        <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Información del Contacto</h5>
        </div>
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="cedula" class="form-label fw-bold">Cédula</label>
                    <input type="text" id="cedula" class="form-control" value={{ $contact->cedula }} readonly>
                </div>

                <div class="col-md-6">
                    <label for="nombre" class="form-label fw-bold">Nombre</label>
                    <input type="text" id="nombre" class="form-control" value={{ $contact->nombre }} readonly>
                </div>

                <div class="col-md-6">
                    <label for="apellido" class="form-label fw-bold">Apellido</label>
                    <input type="text" id="apellido" class="form-control" value={{ $contact->apellido }} readonly>
                </div>

                <div class="col-md-6">
                    <label for="edad" class="form-label fw-bold">Edad</label>
                    <input type="number" id="edad" class="form-control" value={{ $contact->edad }} readonly>
                </div>

                <div class="col-md-6">
                    <label for="genero" class="form-label fw-bold">Género</label>
                    <select id="genero" class="form-select" disabled>
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                        <option value="otros">Otros</option>
                        @foreach(['femenino', 'masculino', 'otros'] as $opcion)
                            <option value="{{ $opcion }}" @selected($contact->genero == $opcion)>
                                {{ ucfirst($opcion) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="telefono" class="form-label fw-bold">Teléfono (Formato: 0000-0000000)</label>
                    <input type="text" id="telefono" class="form-control" value={{ $contact->telefono }} readonly>
                </div>

                <div class="col-md-6">
                    <label for="correo" class="form-label fw-bold">Correo Electrónico</label>
                    <input type="email" id="correo" class="form-control" value={{ $contact->correo }} readonly>
                </div>

                <div class="col-md-6">
                    <label for="estado_civil" class="form-label fw-bold">Estado Civil</label>
                    <select id="estado_civil" class="form-select" disabled>
                        @foreach(['soltero', 'casado', 'divorciado', 'concubinato', 'viudo'] as $opcion)
                            <option value="{{ $opcion }}" @selected($contact->estado_civil == $opcion)>
                                {{ ucfirst($opcion) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="direccion" class="form-label fw-bold">Dirección</label>
                    <textarea id="direccion" class="form-control" rows="2" readonly>{{ $contact->direccion }}</textarea>
                </div>

                <div class="col-md-6">
                    <label for="departamento" class="form-label fw-bold">Departamento</label>
                    <input type="text" id="departamento" class="form-control" value= {{ $contact->departamento }} readonly>
                </div>

                <div class="col-md-6">
                    <label for="cargo" class="form-label fw-bold">Cargo</label>
                    <input type="text" id="cargo" class="form-control" value="{{ $contact->cargo }}"readonly>
                </div>

            </form>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection