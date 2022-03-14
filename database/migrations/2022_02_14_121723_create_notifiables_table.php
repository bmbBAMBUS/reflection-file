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
        Schema::create('notifiables', function (Blueprint $table) {
            $table->id();
            $table->string('notifiable_id', 36);
            $table->enum('notifiable_type', ['user', 'workspace']);
            $table->foreignId('action_id');
            $table->boolean('email');
            $table->boolean('sms');
            $table->boolean('browser');
            $table->timestamps();

            $table->unique(['notifiable_id', 'notifiable_type', 'action_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifiables');
    }
};
