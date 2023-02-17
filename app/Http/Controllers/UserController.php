<?php
namespace App\Http\Controllers; 
use App\Http\Models\Users;
use DB;
class UserController extends Controller { 
   public function show($id= null) { 
      $grt = Users::rte();
      //return ($grt);
      foreach($grt as $val){
         print_r($val->user->toArray());
      }
      
      
   } 
}
?>