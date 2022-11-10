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
        Schema::create('notification_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notification_id')->constrained()->onDelete('cascade');
            $table->foreignId('timezone_id')->constrained()->onDelete('cascade');
            $table->integer('users')->nullable();
            $table->integer('success')->nullable();
            $table->integer('failure')->nullable();
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
        Schema::dropIfExists('notification_reports');
    }
};
