<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscricao_curriculo_user_edital extends Model
{
    use HasFactory;


    //protected $primaryKey = 'id_inscricao';

    /**
     * The users that belong to the Inscricao_curriculo_user_edital
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function curriculo(): BelongsTo
    {
        return $this->belongsTo(Curriculo::class);
    }

    public function edital(): BelongsTo
    {
        return $this->belongsTo(Edital::class);
    }
    /*public function editals(): HasMany
    {
        return $this->hasMany(Edital::class);
    }*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'vaga_escolhida',
        'dt_inscricao'

    ];
}
