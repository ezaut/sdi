<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    use HasFactory;

    /**
    * Get the user that owns the User
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function inscricao_curriculo_user_edital(): BelongsTo
    {
        return $this->belongsTo(Inscricao_curriculo_user_edital::class);
    }

    public function ofertas(): HasMany
    {
        return $this->hasMany(Oferta::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'id_edital',
        'nome_edital',
        'dt_inicio',
        'dt_fim'

    ];
}
