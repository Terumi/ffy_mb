<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateMailboxMessageTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ffy_mailbox_message', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('author_id')->references('id')->on('users')->onDelete('cascade');
                $table->text('body');
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
            Schema::drop('ffy_mailbox_message');
        }
    }
