<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Socialite;
use Auth;
use Exception;
use App\User;


class FacebookController extends Controller
{
    public function redirectToFacebook(Request $request)
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback(Request $request)
    {
        try {

            $user = Socialite::driver('facebook')->user();

			if($user){

				$customer_insert_date = new DateTime();
				echo '<pre>';
				print_r($user);
				exit;

			}


        } catch (Exception $e) {
            dd($e->getMessage());
			return redirect('/');
        }
    }
}
