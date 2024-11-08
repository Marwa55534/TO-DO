<?php

namespace Route\Classess;

class Session{
    // start , set بخزن , get بقرا , unset بمسح , destroy بمسح السيشن

    // start
    public function __construct(){
        session_start();
    }

    // set  $_session['name'] = "ali",
    public static function set($key,$value){
        $_SESSION[$key] = $value;
    }

    // get echo $_session['name']
    public function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null ;
    }

    // unset
    public function remove($key){
        unset($_SESSION[$key]);
    }
    

    // destroy
    public function destroy(){
        session_destroy();
    }

     // check
     public function hasSession($session){
        return isset($_SESSION[$key]) ? true : false ;
    }


}