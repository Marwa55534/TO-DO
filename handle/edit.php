<?php

require_once '../inc/connection.php';
require_once '../App.php';

// check submit , id -- ان احنا جايين من الفورم وكمان معانا ال id
// catch input
// validation لو تمام class 
// empty (errors) select one -> founded -> update
// لو ال update مش تمام هعمل 
// errors 

if($request->check($request->post("submit")) && $request->check($request->get("id"))){ // check ان احنا جايين من الفورم وكمان معانا ال id

    // cath
    $id = $request->get("id");
    $title = $request->filter($request->post("title"));  // catch

    // validation
    $validation->endValidation("title",$title,["Requierd","Str"]);
    $errors = $validation->getErrors();

    if(empty($errors)){
        // empty (errors) select one -> founded -> update
        $runQuery = $conn->prepare("select * from todo where id=:id");
        $runQuery->bindParam(":id",$id);
        $runQuery->execute();
        if($runQuery->rowCount()==1){
            // founded -> update
            $runQuery = $conn->prepare("update todo set `title`=:title where id=:id");
            $runQuery->bindParam(":title",$title);
            $runQuery->bindParam(":id",$id);
            $result = $runQuery->execute();
            if($result){
                $session->set("success","task updated successfully");   // key,value
                $request->redirect("../index.php");
            }else{
                $session->set("errors",["error while update"]);   // key,value
                $request->redirect("../edit.php?id=$id");
            }
        }else{
            // هخزن ف السيشن
            // Session::set("errors",[""]);  // key,value
            $session->set("errors",["todo post not founded"]);   // key,value
            $request->redirect("../index.php");
        }
    }else{
        $session->set("errors","$errors");
       $request->redirect("../edit.php?id=$id");
    }

}else{
    $request->redirect("../index.php");
}