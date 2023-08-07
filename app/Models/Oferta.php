<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    //protected $primaryKey = 'id_oferta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'curso',
        'disciplina',
        'carga_horaria',
        'edital_id'
    ];

    public function edital()
    {
        return $this->belongsTo(Edital::class);
    }

    public function pontuacoes()
    {
        return $this->hasMany(Pontuacoe::class);
    }
}
