<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    //
    protected $table="Medicals";

    public function student(){
        return $this->belongsTo('App\Student','Students_id','id');
    }

}
