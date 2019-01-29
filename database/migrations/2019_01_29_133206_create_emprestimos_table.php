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
            $table->string('data-de-termino');
            $table->string('data-de-inicio');
            $table->integer('fk-id-cliente')->unsigned()->nullable();
            $table->integer('fk-id-livro')->unsigned()->nullable();
            $table->timestamps();
        });

        //definição de chave estrangeira
        Schema::table('emprestimos', function (Blueprint $table) {
          $table->foreign('fk-id-cliente')->references('id')->on('clients')->onDelete('set null');
          $table->foreign('fk-id-livro')->references('id')->on('livros')->onDelete('set null');
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
