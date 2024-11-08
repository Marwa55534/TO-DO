<?php

namespace Route\Classess;
require_once 'Validator.php';
use Route\Classess\Validator;
 
class Requierd implements Validator{

    public function check($key , $value){

        if(empty($value)){
            return "$key is Requierd"; // errors
        }else{
            return false;
        }
    }
}
