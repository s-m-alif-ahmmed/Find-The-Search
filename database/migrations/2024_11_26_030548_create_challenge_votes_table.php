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
        if (!Schema::hasTable('challenge_votes')) {
            Schema::create('challenge_votes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('challenge_id')->constrained('challenges')->onDelete('cascade');
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->foreignId('voter_user_id')->constrained('users')->onDelete('cascade');
                $table->enum('vote',[1,0])->default(1);
                $table->enum('appreciate', ['yes', 'no'])->default('no');
                $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('challenge_votes');
    }
};
