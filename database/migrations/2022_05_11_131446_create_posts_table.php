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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();

            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('avatar')->nullable();
            $table->string('quote');

            $table->unsignedInteger('likes')->default(1);
            $table->unsignedInteger('views')->default(1);
            $table->enum('status', ['active','inactive'])->default('active');
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
        Schema::dropIfExists('posts');
    }
};
