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
        if (!Schema::hasTable('challenges')) {
            Schema::create('challenges', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->dateTime('start_date')->nullable();
                $table->dateTime('end_date')->nullable();
                $table->float('price_money', 10, 2)->nullable();
                $table->float('entry_fee', 10, 2)->nullable();
                $table->dateTime('vote_start_date')->nullable();
                $table->dateTime('vote_end_date')->nullable();
                $table->string('challenge_slug')->nullable();
                $table->enum('status', ['active', 'inactive'])->default('inactive');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
