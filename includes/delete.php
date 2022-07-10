<?php 

require_once '../db/conn.php';
if(!$_POST['id']){
    header('location: ../index.php');
} else {    
    $id=$_POST['id'];
    $result = $crud->deleteEmployee($id);
}

?>