<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $table = 'department';
	protected $primaryKey = 'dep_id';
	// public $timestamps = false;
	// protected $guarded = [];
	//protected $fillable = ['user_name'];
	//const CREATED_AT = 'creation_date';
    	//const UPDATED_AT = 'last_update';
    //protected $connection = 'connection-name';
    public function user(){
        return $this->hasMany('App\Http\Models\Users' , 'fk_dep_id', 'dep_id');
        }        
        
        
}

?>