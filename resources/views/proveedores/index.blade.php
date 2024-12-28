@extends('layout')
@section('titulo', 'Proveedores')
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
            <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Crear proveedor</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-resposive">
                <table class="table table-striped table-sm">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proveedores as $proveedor)
                            <tr>
                                <td scope="row">{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->email }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>{{ $proveedor->direccion }}</td>
                                <td>
                                    <a href="{{ route('proveedores.show', $proveedor->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
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
