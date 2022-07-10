<?php 
//check if there's a session
/* require_once 'includes/auth_check.php'; */
require_once '../db/conn.php';
if(!$_POST['id']){
    include 'includes/error.php';
     header('Location: ../viewrecords.php'); 
} else {
    $id= $_POST['id'];
    $result = $crud->deleteOffice($id);
}
?>