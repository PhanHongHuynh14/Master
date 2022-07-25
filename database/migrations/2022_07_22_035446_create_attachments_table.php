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
        Schema::create('attachmnts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->string('attachable_type',255);
            $table->bigInteger('attachable_id');
            $table->string('file_path');
            $table->string('file_name');
            $table->string('extension');
            $table->string('mime_type');
            $table->integer('size')->unsigned();
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
        Schema::dropIfExists('attachmnts');
    }
};
