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

        Schema::create('receivers', function (Blueprint $table) {
            $table->id();
            $table->string('receiver_id', 36);
            $table->enum('receiver_type', ['User', 'Workspace']);
            $table->foreignId('action_id');
            $table->boolean('email');
            $table->boolean('phone');
            $table->timestamps();

            $table->unique(['receiver_id', 'receiver_type', 'action_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receivers');
    }
};
