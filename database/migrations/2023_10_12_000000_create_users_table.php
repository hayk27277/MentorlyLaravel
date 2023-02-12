<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /** Run the migrations. */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table): void {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->foreignId('user_role_id')->index()->default(2)->constrained();
            $table->foreignId('major_id')->nullable()->constrained();
            $table->string('education');
            $table->text('experience');
            $table->text('aims_description');
            $table->text('about');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->index(['first_name', 'last_name']); // add full text search engine for like queries
            $table->index(['created_at']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /** Reverse the migrations. */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
