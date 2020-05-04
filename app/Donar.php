<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Donar extends Model
{
   
    protected $fillable=['name','d_date','address','ph_number','birth','b_group','user_id'];
    
   


                
            public function user()
            {
                return $this->hasOne('App\User');
            }

}
