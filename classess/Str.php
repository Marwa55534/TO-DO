<?php

namespace Route\Classess;
require_once 'Validator.php';
use Route\Classess\Validator;
 
class Str implements Validator{

    public function check($key , $value){

        if(is_numeric($value) ){
            return "$key must be string"; // errors
        }else{
            return false;
            
        }
    }
}
