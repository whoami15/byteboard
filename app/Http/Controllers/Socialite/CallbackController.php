<?php

namespace App\Http\Controllers\Socialite;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class CallbackController extends Controller
{
    public function __invoke(string $provider)
    {
        if (! in_array($provider, ['github', 'google'])) {
            return back();
        }

        $socialiteUser = Socialite::driver($provider)->user();

        $user = DB::transaction(function () use ($socialiteUser, $provider) {
            return User::query()
                ->updateOrCreate([
                    'provider' => $provider,
                    'provider_id' => $socialiteUser->getId()
                ], [
                    'username' => $socialiteUser->getNickname(),
                    'name' => $socialiteUser->getName(),
                    'email' => $socialiteUser->getEmail(),
                    'access_token' => $socialiteUser->token,
                    'role' => Role::USER,
                ]);
        }, 2);

        Auth::loginUsingId($user->getKey());

        return to_route('dashboard');
    }
}
