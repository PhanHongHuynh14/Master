<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedInteger('makh')->generatedAs();
            $table->string('age');
            $table->string('address', 255);
            $table->string('phone', 255)->unique();
            $table->string('cmnd', 255)->unique();
            $table->string('bank', 255);
            $table->tinyInteger('sex');
            $table->Integer('role_id');
            $table->date('birthday');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('customers');
    }
};
