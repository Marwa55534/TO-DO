<?php


require_once '../inc/connection.php';
require_once '../App.php';

// check  معانا ال id
//  select one -> founded -> delete
// لو ال delete مش تمام هعمل 
// errors


if($request->check($request->get("id"))){ // check ان احنا جايين من الفورم وكمان معانا ال id

    // cath
    $id = $request->get("id");

        //  select one -> founded -> update
        $runQuery = $conn->prepare("select * from todo where id=:id");
        $runQuery->bindParam(":id",$id);
        $runQuery->execute();
        if($runQuery->rowCount()==1){
            // founded -> update
            $runQuery = $conn->prepare("delete from todo where id=:id");
            $runQuery->bindParam(":id",$id);
            $result = $runQuery->execute();
            if($result){
                $session->set("success","task deleted successfully");   // key,value
                $request->redirect("../index.php");
            }else{
                $session->set("errors",["error while delete"]);   // key,value
                $request->redirect("../index.php");
            }
        }else{
            // هخزن ف السيشن
            // Session::set("errors",[""]);  // key,value
            $session->set("errors",["todo post not founded"]);   // key,value
            $request->redirect("../index.php");
        }
   

}else{
    $request->redirect("../index.php");
}