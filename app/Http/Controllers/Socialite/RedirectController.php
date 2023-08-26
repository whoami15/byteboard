<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class RedirectController extends Controller
{
    public function __invoke(string $provider)
    {
        if (! in_array($provider, ['github', 'google'])) {
            return back();
        }

        return Socialite::driver($provider)->redirect();
    }
}
