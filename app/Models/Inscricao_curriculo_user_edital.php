<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao_curriculo_user_edital extends Model
{
    use HasFactory;

    /**
     * The users that belong to the Inscricao_curriculo_user_edital
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function curriculos(): HasMany
    {
        return $this->hasMany(Curriculo::class);
    }

    public function editals(): HasMany
    {
        return $this->hasMany(Edital::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'inscricao_id',
        'vaga_escolhida',
        'dt_inscricao'

    ];
}
