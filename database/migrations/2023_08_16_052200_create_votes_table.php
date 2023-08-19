<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->morphs('votable');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'votable_id', 'votable_type', 'type'], 'vote_user_votable_type_type_index');

            $table->unique(['user_id', 'votable_id', 'votable_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
