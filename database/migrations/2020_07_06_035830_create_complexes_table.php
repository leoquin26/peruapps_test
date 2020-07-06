<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complexes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('complex_type');
            $table->string('boss');
            $table->string('location');
            $table->json('sports');
            $table->string('area');
            $table->timestamps();
            /*
             * Relacion con la tabla de sedes ya que cada complejo debe pertenecer a una seda.
             * */
            $table->foreignId('head_quarter_id')
            ->references('id')
                ->on('head_quarters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complexes');
    }
}
