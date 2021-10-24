<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoria');
            $table->timestamps();



        });

        //inserir dados 

        DB::table('categorias')->insert(
            [

            [ 'categoria'=>'Auto'],
            
            ['categoria'=>'Beauty and Fitness'],
            ['categoria'=>'Entertainment'],
            ['categoria'=>'Food and Dining'],
            ['categoria'=>'Health'],
            ['categoria'=>'Sports'],
            ['categoria'=>'Travel']
            
            ]
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
