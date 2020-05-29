<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pedidos extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_produto';
    public $timestamps = false;
}
