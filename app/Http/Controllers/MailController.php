<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function testmail($id)
    {
        $article = Article::findOrFail($id);
        $email = "sornseksan15@gmail.com";
        //หรือ ใช้ relationship เรียกจากตาราง user
        //$email = $article->user->email; 
         
        Mail::to($email)->send(new TestMail($article));
    }
}
