@extends('layout')
@section('titulo', 'Productos')
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
            <a href="{{ route('producto.create') }}" class="btn btn-primary">Crear producto</a>
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
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td scope="row">{{ $producto->nombre }}</td>
                                <td>{{ $producto->descripcion }}</td>
                                <td>{{ $producto->cantidad }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>{{ $producto->categoria->nombre }}</td>
                                <td>{{ $producto->proveedor->nombre }}</td>
                                <td>
                                    <a href="{{ route('producto.show', $producto->id) }}" class="btn btn-warning btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('producto.destroy', $producto->id) }}" method="post">
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
