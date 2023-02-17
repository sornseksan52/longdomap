<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Socialite;
use Auth;
use Exception;
use App\User;

class GoogleController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {

        try {

            $user = Socialite::driver('google')->user();

			if($user){

				echo '<pre>';
				print_r($user);
				exit;
				$data = (object) $user->user;

			}


        } catch (Exception $e) {
            dd($e->getMessage());
			return redirect('/');
        }
    }
}
