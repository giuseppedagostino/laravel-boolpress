<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfopostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infoposts', function (Blueprint $table) {
            $table->id();
            // creo la colonna BigInteger
            $table->unsignedBigInteger('post_id');
            $table->string('post_status', 7);
            $table->string('comment_status', 7);
            // $table->timestamps();

            // e assegno la relazione
            $table->foreign('post_id')
                ->references('id')
                ->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infoposts');
    }
}
