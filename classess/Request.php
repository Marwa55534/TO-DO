<?php

namespace Route\Classess;

class Request {

    public function get($key){

      // منقراش ع طول غير لما نتشيك الاول 

      return (isset($_GET[$key])) ?$_GET[$key] : null;

        // if(isset($_GET[$key])){
        //     return $_GET[$key];
        // }else{
        //     return null;
        // }
    }

    
    public function post($key){ 

      return (isset($_POST[$key])) ? $_POST[$key] : null;

        // if(isset($_POST[$key])){
        //     return $_POST[$key];
        // }else{
        //     return null;
        // }
    }

    public function file($key){ 

        return (isset($_FILES[$key])) ? $_FILES[$key] : null;
  
          // if(isset($_POST[$key])){
          //     return $_POST[$key];
          // }else{
          //     return null;
          // }
      }

    //isset ونتشيك انه جاي من request post , get
    public function check($date){
      return isset($date);
      //if(isset($_POST['submit']))
      //if(isset($_GET['submit']))
    }

    public function filter($date){
      return trim(htmlspecialchars($date));
//     $name = trim(htmlspecialchars($_POST['name']));
//     $name = trim(htmlspecialchars($_GET['name']));

    }

    public function checkMethod(){
      return $_SERVER['REQUEST_METHOD'];
    }

    public function redirect($path){
        header("location:" . $path);
    }
}
