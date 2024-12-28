@extends('layout')
@section('titulo', 'Editar producto')
@section('contenido')
    <div class="row mb-3">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a href="{{ route('productos.index') }}" class="btn btn-danger">Regresar</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @foreach ($productos as $producto)
                <form action="{{ route('producto.update', $producto->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $producto->nombre) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripcion</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                            cols="30" rows="5">{{ old('description', $producto->descripcion) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Cantidad</label>
                        <input type="number" name="quantity" id="quantity"
                            class="form-control @error('quantity') is-invalid @enderror"
                            value="{{ old('quantity', $producto->cantidad) }}">
                        @error('quantity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" name="price" id="price"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price', $producto->precio) }}">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                            <option value="{{ $producto->id_categoria }}">{{ $producto->categoria->nombre }}</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}"
                                    {{ old('category') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Proveedor</label>
                        <select name="supplier" id="supplier" class="form-control @error('supplier') is-invalid @enderror">
                            <option value="{{ $producto->id_proveedor }}">{{ $producto->proveedor->nombre }}</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}"
                                    {{ old('supplier') == $proveedor->id ? 'selected' : '' }}>
                                    {{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                        @error('supplier')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            @endforeach
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
