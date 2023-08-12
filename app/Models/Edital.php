<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edital extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    //protected $primaryKey = 'id_edital';
    protected $cascadeDeletes = ['inscricao_curriculo_user_editals', 'ofertas'];

    protected $dates = ['deleted_at'];

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
    public function inscricao_curriculo_user_editals(): HasMany
    {
        return $this->hasMany(Inscricao_curriculo_user_edital::class);
    }

    public function ofertas(): HasMany
    {
        return $this->hasMany(Oferta::class);
    }
}
