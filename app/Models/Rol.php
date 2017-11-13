<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model 
{

    protected $table = 'roles';
    public $timestamps = true;
    protected $fillable = array('name','idState','observation');

    public function user(){

        return $this->belongsTo(User::Class);

    }

    public function scopeFilters($query,$datos){
    	if(isset($datos["name"])){
    		$query->where("name",'like',"%".$datos["name"]."%");
    	}
        if(isset($datos["idState"])){
            if(is_array($datos["idState"]))
            $query->whereIn("idState",$datos["idState"]);
            else
            $query->where("idState",$datos["idState"]);
        }
        
    	
    	return $query;
    		
    }


}