<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFfyMailboxThreadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ffy_mailbox_thread', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->references('id')->on('users');
            $table->integer('recipient_id')->references('id')->on('users');
            $table->string('title');
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
        Schema::drop('ffy_mailbox_thread');
    }
}
