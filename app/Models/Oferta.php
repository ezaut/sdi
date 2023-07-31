<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    public function edital(): BelongsTo
    {
        return $this->belongsTo(Edital::class);
    }

    public function pontuacoes(): HasMany
    {
        return $this->hasMany(Pontuacoe::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'id_ofertas',
        'curso',
        'disciplina',
        'carga_horaria'

    ];
}
