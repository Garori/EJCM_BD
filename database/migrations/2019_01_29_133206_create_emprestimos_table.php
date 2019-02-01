<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('data_de_termino');
            $table->string('data_de_inicio');
            $table->integer('fk_id_cliente')->unsigned()->nullable();
            $table->integer('fk_id_livro')->unsigned()->nullable();
            $table->timestamps();
        });

        //definição de chave estrangeira
        Schema::table('emprestimos', function (Blueprint $table) {
          $table->foreign('fk_id_cliente')->references('id')->on('clients')->onDelete('set null');
          $table->foreign('fk_id_livro')->references('id')->on('livros')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}
