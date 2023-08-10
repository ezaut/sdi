<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pontuacoe extends Model
{
    use HasFactory;

    //protected $primaryKey = 'id_pontuacao';

    public function oferta(): BelongsTo
    {
        return $this->belongsTo(Oferta::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'grupo',
        'pontos',
        'pontuacao_max',
        'descricao',
        'oferta_id'

    ];
}
