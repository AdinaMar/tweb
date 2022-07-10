<?php 
require_once '../db/conn.php';


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST["address"];


    $isAdded = $crud->insertOffice($name, $address);

    if($isAdded){
        header('Location: ../viewoffices.php'); 
    }      
}