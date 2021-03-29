<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Donar extends Model 
{

  
    protected $fillable=['name','image','d_date','district_id','city_id','ph_number','birth','b_group','user_id'];
    
   


                
            public function user()
            {
                return $this->hasOne('App\User');
            }

            public function district()
            {
                return $this->hasOne('App\Distict');
            }
           

           
           

}
