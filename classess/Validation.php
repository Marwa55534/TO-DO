<?php

namespace Route\Classess;
// use Route\Classess\Requierd;
// use Route\Classess\Str;


require_once 'Requierd.php';
require_once 'Str.php';

class Validation{

    private $errors = [];

    public function endValidation($key,$value,$rules){ // دا المبدا الاخير 
        foreach ($rules as $rule) {
            $rule = "Route\Classess\\" . $rule;  // use
            $obj = new $rule; // "Requierd","Str"
            $result = $obj->check($key,$value); //  abstract method
            if($result != false){
                $this->errors[] = $result;
               // return $this->errors;
            }
        }
    }

    public function getErrors(){
        return $this->errors;
    }
} 
