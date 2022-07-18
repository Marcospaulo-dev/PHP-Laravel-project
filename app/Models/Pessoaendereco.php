<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pessoaendereco
 *
 * @property $id
 * @property $cod_pessoa
 * @property $endereco
 * @property $numero_endereco
 * @property $complemento
 * @property $bairro
 * @property $cidade
 * @property $uf
 * @property $created_at
 * @property $updated_at
 *
 * @property Pessoa $pessoa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pessoaendereco extends Model
{
    
    static $rules = [
		'cod_pessoa' => 'required',
		'endereco' => 'required',
		'numero_endereco' => 'required',
		'complemento' => 'required',
		'bairro' => 'required',
		'cidade' => 'required',
		'uf' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cod_pessoa','endereco','numero_endereco','complemento','bairro','cidade','uf'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pessoa()
    {
        return $this->hasOne('App\Models\Pessoa', 'id', 'cod_pessoa');
    }
    

}
