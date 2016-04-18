<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateFfyMailboxThreadRecipientTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('ffy_mailbox_thread_recipient', function (Blueprint $table) {
                $table->integer('thread_id')->references('id')->on('mailbox_thread')->onDelete('cascade');
                $table->integer('user_id')->references('id')->on('users');
                $table->boolean('seen')->default(true);
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
            Schema::drop('ffy_mailbox_thread_recipient');
        }
    }
