<?php

declare(strict_types=1);

namespace App\Domain\Produto;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'titulo',
        'descricao',
        'preco',
        'fabricante'
    ];
}