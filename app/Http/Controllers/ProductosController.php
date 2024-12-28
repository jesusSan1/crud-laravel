<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::with('categoria', 'proveedor')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categorias::all();
        $proveedores = Proveedores::all();
        return view('productos.create', compact('categorias', 'proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'nullable|string|min:5|max:255',
            'quantity' => 'nullable|numeric|min:1|max:255',
            'price' => 'nullable|min:1|max:255',
            'category' => 'required',
            'supplier' => 'required',
        ]);

        Productos::create([
            'nombre' => $request->input('name'),
            'descripcion' => $request->input('description'),
            'cantidad' => $request->input('quantity'),
            'precio' => $request->input('price'),
            'id_categoria' => $request->input('category'),
            'id_proveedor' => $request->input('supplier'),
        ]);

        return redirect()->route('productos.index')->with('success', 'Datos guardados correctamente');
    }

    public function show(int $id)
    {
        $productos = Productos::all();
        $categorias = Categorias::all();
        $proveedores = Proveedores::all();
        return view('productos.show', compact('productos', 'categorias', 'proveedores'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'nullable|string|min:5|max:255',
            'quantity' => 'nullable|numeric|min:1|max:255',
            'price' => 'nullable|min:1|max:255',
            'category' => 'required',
            'supplier' => 'required',
        ]);

        $producto = Productos::find($id);
        $producto->update([
            'nombre' => $request->input('name'),
            'descripcion' => $request->input('description'),
            'cantidad' => $request->input('quantity'),
            'precio' => $request->input('price'),
            'id_categoria' => $request->input('category'),
            'id_proveedor' => $request->input('supplier'),
        ]);

        return redirect()->route('productos.index')->with('success', 'Datos actualizados correctamente');
    }

    public function destroy($id)
    {
        $producto = Productos::find($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
