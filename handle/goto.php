<?php
require_once '../inc/connection.php';

require_once '../App.php';

// check status , id -- ان احنا جايين من status وكمان معانا ال id
// catch input
// empty (errors) select one -> founded -> update
// لو ال update مش تمام هعمل 
// errors 

if($request->check($request->get("status")) && $request->check($request->get("id"))){ // check ان احنا جايين من الفورم وكمان معانا ال id

    // cath
    $id = $request->get("id");
    $status = $request->get("status");

    $runQuery = $conn->prepare("select * from todo where id=:id");
    $runQuery->bindParam(":id",$id);
    $runQuery->execute();
    if($runQuery->rowCount()==1){


        $runQuery = $conn->prepare("update todo set `status`=:status where id=:id");
        $runQuery->bindParam(":status",$status);
        $runQuery->bindParam(":id",$id);
        $result = $runQuery->execute();
        if($result){
            $session->set("success","status updated successfully");   // key,value
            $request->redirect("../index.php");
        }else{
            $session->set("errors",["error while update status"]);   // key,value
            $request->redirect("../edit.php?id=$id");
        }
    }else{
        $session->set("errors",["todo post not founded"]);   // key,value
        $request->redirect("../index.php");
    }

    
}else{
    $request->redirect("../index.php");
}
