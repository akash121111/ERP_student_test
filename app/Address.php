<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
   protected $table='Addresss';
   public function student(){
    return $this->belongsTo('App\Student','Students_id','id');
}

public function address_types(){
    return $this->belongsTo('App\Address_types_id','Students_id','id');
}
   
}
