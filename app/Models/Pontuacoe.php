<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pontuacoe extends Model
{
    use HasFactory;

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
        'id_pontuacao',
        'grupo',
        'pontos',
        'descricao'

    ];
}
