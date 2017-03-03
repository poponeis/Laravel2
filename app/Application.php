<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $fillable = ['application','active'];
    public function menu(){
        return $this->belongsTo('App\Menu');
    }
}
