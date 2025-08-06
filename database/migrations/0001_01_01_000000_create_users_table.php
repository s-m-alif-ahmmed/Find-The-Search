<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('first_name', 150);
                $table->string('last_name', 150);
                $table->string('email', 150)->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('number')->nullable();
                $table->string('password');

                $table->boolean('terms_and_policy')->default(0);
                $table->boolean('promotion_permission')->default(0);

                $table->string('avatar')->nullable();
                $table->string('job_title',150)->nullable();
                $table->date('dob')->nullable();
                $table->enum('gender', ['male', 'female', 'other'])->nullable();

                $table->string('google_id')->nullable()->unique();
                $table->string('apple_id')->nullable()->unique();

                $table->string('reset_code')->nullable();
                $table->timestamp('reset_code_expires_at')->nullable();

                $table->enum('role', ['admin', 'user'])->default('user')->nullable(false);
                $table->enum('status', ['active', 'inactive'])->default('active');

                $table->rememberToken();
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
                $table->softDeletes();
            });
        }

        if (!Schema::hasTable('password_reset_tokens')) {
            Schema::create('password_reset_tokens', function (Blueprint $table) {
                $table->string('email')->primary();
                $table->string('token');
                $table->timestamp('created_at')->nullable();
            });
        }

        if (!Schema::hasTable('sessions')) {
            Schema::create('sessions', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->foreignId('user_id')->nullable()->index();
                $table->string('ip_address', 45)->nullable();
                $table->text('user_agent')->nullable();
                $table->longText('payload');
                $table->integer('last_activity')->index();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
