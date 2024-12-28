<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = ['nombre', 'descripcion', 'cantidad', 'precio', 'id_categoria', 'id_proveedor'];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria', 'id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'id_proveedor', 'id');
    }
}
