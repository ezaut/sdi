<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curriculo extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;


    //protected $primaryKey = 'id_curriculo';
    protected $cascadeDeletes = ['inscricao_curriculo_user_editals'];

    /**
    * Get the user that owns the User
    *
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    */
    public function inscricao_curriculo_user_editals(): HasMany
    {
        return $this->hasMany(Inscricao_curriculo_user_edital::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'grupo',
        'descricao',
        'link_documento',
        'pontos',
        'valido_invalido'

    ];
}
