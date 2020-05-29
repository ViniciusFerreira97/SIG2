<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Fornecedores extends Model
{
    protected $table = 'fornecedores';
    protected $primaryKey = 'id_fornecedor';
    public $timestamps = false;
}
