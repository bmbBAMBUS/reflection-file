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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('settingable_id', 36);
            $table->string('settingable_type');
            $table->foreignId('action_id');
            $table->boolean('email');
            $table->boolean('sms');
            $table->boolean('browser');
            $table->string('email_receiver')->nullable();
            $table->string('phone_receiver')->nullable();
            $table->timestamps();

            $table->unique(['action_id', 'settingable_id', 'settingable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
