<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oferta extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    //protected $primaryKey = 'id_oferta';
    protected $cascadeDeletes = ['pontuacoes'];

    protected $dates = ['deleted_at'];

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

    public function edital(): BelongsTo
    {
        return $this->belongsTo(Edital::class);
    }

    public function pontuacoes(): HasMany
    {
        return $this->hasMany(Pontuacoe::class);
    }
}
