<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    public $fillable = ['menu','active'];
    public function applications(){
        return $this->hasMany('App\Application');
    }
}