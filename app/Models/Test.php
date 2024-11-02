<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'name',
        'price'
    ];
    public function someFunction() // Cambia "someFunction" al nombre que necesites
    {
        // Lógica aquí
    }
}
