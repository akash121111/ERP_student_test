<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table="Students";

    public function medical(){
        return $this->hasOne('App\Medical','Students_id','id');
    }
    public function address(){
        return $this->hasOne('App\Address','Students_id','id');
    }

}
