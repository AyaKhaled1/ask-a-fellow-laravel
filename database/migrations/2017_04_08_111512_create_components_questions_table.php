<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question');
            $table->integer('asker_id')->unsigned();
            $table->integer('componenet_id')->unsigned();
            $table->foreign('asker_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('componenet_id')->references('id')->on('components')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('components_questions');
    }
}
