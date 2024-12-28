@extends('layout')
@section('titulo', '¡Bienvenido a la página de inicio!')
@section('contenido')
    <p>Esta es la página de inicio de la aplicación.</p>
    <p>Para navegar por la aplicación, utiliza el menú de navegación.</p>
    <p>¡Esperamos que disfrutes de tu visita!</p>
    <div class="row">
        <div class="col-md-6">
            <h5 class="card-title mb-3">Producto con menor cantidad</h5>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text">{{ $lowStockProduct->nombre }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="card-title mb-3">Categoria con mas producto</h5>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-text">{{ $popularCategory->nombre }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
