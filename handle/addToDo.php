<?php

require_once '../inc/connection.php';
require_once '../App.php';

// check ان احنا جايين من الفورم
// catch input
// validation لو تمام class  
// insert
// لو ال insert مش تمام هعمل 
// errors

if($request->check($request->post("submit"))){ // check

    $title = $request->filter($request->post("title"));  // catch

    // validation (Requierd , Str)
    // title 
    $validation->endValidation("title",$title,["Requierd","Str"]); // $key,$value,[$rules]
    $errors = $validation->getErrors();

    if(empty($errors)){
        // insert 
        $runQuery = $conn->prepare("insert into todo(`title`) values(:title)");
        $runQuery->bindParam(":title",$title,PDO::PARAM_STR);
        $result = $runQuery->execute();
        if($result){
            // هخزن ف السيشن
            // Session::set("errors",[""]);  // key,value
            $session->set("success","task inserted successfully");   // key,value
            $request->redirect("../index.php");
        }else{
            // هخزن ف السيشن
            // Session::set("errors",[""]);  // key,value
            $session->set("errors",["error while insert"]);   // key,value
            $request->redirect("../index.php");
        }
    }else{
        // هخزن ف السيشن
       // Session::set("errors",[""]);  // key,value
       $session->set("errors",$errors);   // key,value
       $request->redirect("../index.php");
    }

}else{
    $request->redirect("../index.php");
}