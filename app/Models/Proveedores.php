<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    protected $table = 'proveedores';

    protected $fillable = ['nombre', 'email', 'telefono', 'direccion'];

    public function productos()
    {
        return $this->hasMany(Productos::class, 'id_proveedor', 'id');
    }
}
