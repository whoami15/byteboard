<?php

namespace App\Providers;

use App\Models\Answer;
use App\Models\Comment;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        JsonResource::withoutWrapping();

        Model::shouldBeStrict(! App::isProduction());

        Model::unguard();

        Relation::enforceMorphMap([
            'user' => User::class,
            'topic' => Topic::class,
            'answer' => Answer::class,
            'comment' => Comment::class,
        ]);
    }
}
