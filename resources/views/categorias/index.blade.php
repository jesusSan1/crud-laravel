@extends('layout')
@section('titulo', 'Categorias')
@section('contenido')
    @session('success')
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $value }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    @endsession
    <div class="row mb-3">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a href="{{ route('categorias.create') }}" class="btn btn-primary">Crear categoria</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-resposive">
                <table class="table table-striped table-sm">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td scope="row">{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>
                                    <a href="{{ route('categorias.show', $categoria->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $categoria->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
