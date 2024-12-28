<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'nullable|string|min:5|max:255',
        ]);

        Categorias::create([
            'nombre' => $request->input('name'),
            'descripcion' => $request->input('description'),
        ]);
        return redirect()->to('/categorias')->with('success', 'Datos guardados correctamente');
    }

    public function show(int $id)
    {
        $categoria = Categorias::find($id);
        return view('categorias.show', compact('categoria'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'nullable|string|min:5|max:255',
        ]);

        Categorias::find($id)->update([
            'nombre' => $request->input('name'),
            'descripcion' => $request->input('description'),
        ]);

        return redirect()->to('/categorias')->with('success', 'Dato actualizado correctamente');
    }

    public function destroy(int $id)
    {
        $categorias = Categorias::find($id);
        $categorias->delete();
        return redirect()->to('/categorias')->with('success', 'Elemento eliminado correctamente');
    }
}
