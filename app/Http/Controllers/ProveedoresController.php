<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function index()
    {
        $proveedores = Proveedores::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'nullable|email|max:255|min:5',
            'phone' => 'nullable|digits:10',
            'address' => 'nullable|string|max:255|min:5',
        ]);

        Proveedores::create([
            'nombre' => $request->input('name'),
            'email' => $request->input('email'),
            'telefono' => $request->input('phone'),
            'direccion' => $request->input('address'),
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Datos guardados correctamente');
    }

    public function show(int $id)
    {
        $proveedor = Proveedores::find($id);
        return view('proveedores.show', compact('proveedor'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'nullable|email|max:255|min:5',
            'phone' => 'nullable|digits:10',
            'address' => 'nullable|string|max:255|min:5',
        ]);

        Proveedores::find($id)->update([
            'nombre' => $request->input('name'),
            'email' => $request->input('email'),
            'telefono' => $request->input('phone'),
            'direccion' => $request->input('address'),
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Dato actualizado correctamente');
    }

    public function destroy(int $id)
    {
        Proveedores::find($id)->delete();
        return redirect()->back()->with('success', 'Datos eliminados correctamente');
    }
}
