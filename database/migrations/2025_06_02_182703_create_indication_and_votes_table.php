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

        Schema::create('indications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('address');
            $table->string('reference')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->json('photos');
            $table->json('attractives');
            $table->date('event_day');
            $table->time('event_time');
            $table->timestamps();
        });

        Schema::create('votes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('indication_id')->constrained('indications')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'indication_id']);
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
        Schema::dropIfExists('indications');
    }
};
