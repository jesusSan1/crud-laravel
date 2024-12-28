<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Productos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $lowStockProduct = Productos::orderBy('cantidad', 'asc')->first();
        $popularCategory = Categorias::withCount('productos')->orderBy('id', 'desc')->first();
        return view('index', compact('lowStockProduct', 'popularCategory'));
    }
}
