<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    use HasFactory;


    //protected $primaryKey = 'id_curriculo';

    /**
    * Get the user that owns the User
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function inscricao_curriculo_user_editals()
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
        'arquivo_documento',
        'pontos',
        'valido_invalido'

    ];
}
