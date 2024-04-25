<?php

namespace App\Http\Controllers\Keycloak;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToKeycloak()
    {
        return Socialite::driver('keycloak')->redirect();
    }

    public function handleKeycloakCallback()
    {
        $user = Socialite::driver('keycloak')->user();
        try {
            DB::beginTransaction();
            $user = User::updateOrCreate([
                'keycloak_auth_id' => $user->id,
            ], [
                'name' => $user->name,
                'email' => $user->email,
                'keycloak_access_token' => $user->token,
                'keycloak_refresh_token' => $user->refreshToken,
            ]);
            DB::commit();

            Auth::login($user);
            return redirect()->intended('/');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
