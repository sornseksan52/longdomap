<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class TestController extends Controller
{
    public function index(){
        return view('home');
    }

    public function mapApi(Request $request){
        return view('apimap.map');
    }

    public function getVerifydata(Request $request){
        // $validatedData = $request->validate([
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'email',
        // ]);

        $validatedData = $request->validateWithBag('post', [
            'name' => ['required', 'max:10'],
            'email' => ['required' , 'email'],
        ]);

        print_r($validatedData); exit;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:10',
        ]);

        print_r($validator->passes()); exit;

        // if ($validator->fails()) {
        //     return redirect('post/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        // return response("welcome ". $request->input('name'));
    }
}
