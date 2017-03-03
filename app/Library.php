<?php
/**
 * Created by PhpStorm.
 * User: eduardo
 * Date: 01/03/17
 * Time: 20:07
 */

namespace App;

/**
 * Class Library for some useful general functions
 * @package App
 */
class Library
{
    public static function checkBoxValidator($checkBox){
        return ($checkBox==1?1:0);
    }
}