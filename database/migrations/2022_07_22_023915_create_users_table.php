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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('email', 32);
            $table->string('username', 50);
            $table->string('password', 200);
            $table->string('address');
            $table->unsignedBigInteger('school_id')->nullable();
            $table->tinyInteger('type')->comment('For detect user');
            $table->integer('parent_id');
            $table->timestamp('verified_at');
            $table->boolean('closed')->default(false);
            $table->string('code')->unique()->nullable();
            $table->tinyInteger('social_type');
            $table->string('social_id')->unique()->nullable();
            $table->string('social_name');
            $table->string('social_nickname');
            $table->string('social_avatar');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes('deleted_at');

            $table->foreign('school_id')->references('id')->on('schools')
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
        Schema::dropIfExists('users');
    }
};
