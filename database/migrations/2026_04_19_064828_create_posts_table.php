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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();

            $table->string('title');
            $table->text('body');

            $table->string('platform');
            $table->boolean('vc_flag')->default(false);
            $table->boolean('beginner_flag')->default(false);

            $table->string('play_time')->nullable();
            $table->integer('recruit_count')->default(1);

            $table->string('status')->default('open');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
