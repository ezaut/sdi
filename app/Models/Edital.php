<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    use HasFactory;

    //protected $primaryKey = 'id_edital';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'nome_edital',
        'dt_inicio',
        'dt_fim'
    ];

    /**
    * Get the user that owns the User
    *
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    */
    public function inscricao_curriculo_user_editals()
    {
        return $this->hasMany(Inscricao_curriculo_user_edital::class);
    }

    public function ofertas(): HasMany
    {
        return $this->hasMany(Oferta::class);
    }
}
