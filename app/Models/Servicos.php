<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Servicos extends Model
{
    protected $table = 'servicos';
    protected $primaryKey = 'id_servico';
    public $timestamps = false;
}
