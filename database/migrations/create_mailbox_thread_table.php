<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateFfyThreadRecipientTable extends Migration
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
                $table->integer('creator_id')->references('id')->on('users')->onDelete('cascade');
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
