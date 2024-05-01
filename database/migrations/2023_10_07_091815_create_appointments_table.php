<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->bigInteger('Phone_number');
            $table->integer('Quote_number')->unique();
            $table->datetime('start_time');
            $table->datetime('finish_time');
            $table->longText('comments')->nullable();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on("clients"); 
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); 
      
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
