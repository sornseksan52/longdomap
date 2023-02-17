<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Socialite;
use App\User;
use App\SocialAccount;

class LoginController extends Controller
{
    public function redirectToProvider($provider = 'facebook')
    {
       return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider = 'facebook')
    {
       $providerUser = Socialite::driver($provider)->user();
       $user = $this->createOrGetUser($provider, $providerUser);
       auth()->login($user);
       return redirect()->to('/home');
    }

    public function createOrGetUser($provider, $providerUser)
    {
        $account = SocialAccount::whereProvider($provider)
                 ->whereProviderUserId($providerUser->getId())
                 ->first();
        if ($account) {
            return $account->user;
        } else {
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                  'email' => $providerUser->getEmail(),
                  'name' => $providerUser->getName(),
                  'password' => md5(rand(1,10000)),
                ]);
            }
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}
