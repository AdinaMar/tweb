<?php
require_once '../db/conn.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $office = $_POST["office"];

    $result = $crud->editEmployee($id, $name, $email, $role, $office);
    if($result){
        header('Location: ../viewrecords.php');
    } else {
        include 'error.php';
    }
}else {
    include 'error.php';
}
?>