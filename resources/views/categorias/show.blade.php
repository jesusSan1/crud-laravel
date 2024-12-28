@extends('layout')
@section('titulo', 'Editar categoria')
@section('contenido')
    <div class="row mb-3">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a href="{{ route('categorias.index') }}" class="btn btn-danger">Regresar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="{{ route('categorias.update', $categoria->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $categoria->nombre) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripcion</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                        cols="30" rows="5">{{ old('description', $categoria->descripcion) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
