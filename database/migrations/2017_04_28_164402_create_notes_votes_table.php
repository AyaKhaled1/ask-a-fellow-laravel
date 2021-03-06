<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('note_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('type')->unsigned();
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes_votes', function (Blueprint $table) {
            Schema::drop('notes_votes'); 
        });
    }
}
