<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function inscricao_curriculo_user_editals(): hasMany
    {
        return $this->hasMany(Inscricao_curriculo_user_edital::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cpf',
        'name',
        'email',
        'password',
        'nome_mae',
        'dt_nascimento',
        'escolaridade',
        'grupo',
        'endereco',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'cep',
        'rg',
        'org_exp',
        'dt_emissao',
        'telefone',
        'sexo',
        'type'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin", "servidor"][$value],
        );
    }
}
