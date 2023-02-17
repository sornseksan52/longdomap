<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	protected $table = 'users';
	// protected $primaryKey = 'user_id';
	// public $timestamps = false;
	// protected $guarded = [];
	//protected $fillable = ['user_name'];
	//const CREATED_AT = 'creation_date';
    	//const UPDATED_AT = 'last_update';
    //protected $connection = 'connection-name';
    public static function rte(){
       $tyr = Users::HasName()->with('department')->get();
       return $tyr;
    }
    public function scopeHasName($query) { 
        return $query->where('user_id', '>', 1); 
        }
        public function scopeFk($query) { 
         return $query->where('fk_dep_id', '>',1); 
         }
         public function department(){
            return $this->belongsTo('App\Http\Models\Department' , 'fk_dep_id');
            }
              
        
        
}

?>