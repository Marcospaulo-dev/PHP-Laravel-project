<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pessoa
 *
 * @property $id
 * @property $nome
 * @property $cpf
 * @property $data_nascimento
 * @property $telefone
 * @property $email
 * @property $created_at
 * @property $updated_at
 *
 * @property Pessoaendereco[] $pessoaenderecos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pessoa extends Model
{
    
    static $rules = [
		'nome' => 'required',
		'cpf' => 'required',
		'data_nascimento' => 'required',
		'telefone' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nome','cpf','data_nascimento','telefone','email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pessoaenderecos()
    {
        return $this->hasMany('App\Models\Pessoaendereco', 'cod_pessoa', 'id');
    }
    

}
