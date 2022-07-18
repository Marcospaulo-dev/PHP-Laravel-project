<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoaenderecos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cod_pessoa');
            $table->foreign('cod_pessoa')->references('id')->on('pessoas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('endereco', 60);
            $table->string('numero_endereco', 15);
            $table->string('complemento', 15);
            $table->string('bairro', 35);
            $table->string('cidade', 45);
            $table->string('uf', 2);       

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
