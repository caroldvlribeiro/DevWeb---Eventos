<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
    'titulo',
    'descricao',
    'data_evento',
    'local',
    'valor',
    'quantidade_vagas',
];
}