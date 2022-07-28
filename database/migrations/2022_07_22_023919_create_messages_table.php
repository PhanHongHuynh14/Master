<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room', 255);
            $table->unsignedBigInteger('sender_id');
            $table->string('sender_type', 255);
            $table->unsignedBigInteger('receiver_id');
            $table->string('receiver_type', 255);
            $table->text('content');
            $table->string('content_type', 255)->default('text');
            $table->unsignedBigInteger('association_id')->nullable()->default(null);
            $table->string('association_type', 255)->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes('deleted_at');

            $table->foreign('sender_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
