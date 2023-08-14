<?php

use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tag_topic', function (Blueprint $table) {
            $table->foreignIdFor(Tag::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->foreignIdFor(Topic::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tag_topic');
    }
};
