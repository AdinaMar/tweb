<?php 
require_once '../db/conn.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $em =  $_POST["email"];
    $pass = $_POST["password"];
    $username = $_POST["username"];


    //PROFILE IMAGE
    if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0){

        $allowed_ext = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $file_name = $_FILES["avatar"]["name"];
        $file_type = $_FILES["avatar"]["type"];
        $file_dim = $_FILES["avatar"]["size"];
       
        

        //check extensions
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $destination = "uploads/$username.$ext";
        if(!array_key_exists($ext, $allowed_ext)) die("Please select a valid image");

        
        //check for max size
        $max_size = 5 * 1024 * 1024;
        if($file_dim > $max_size) die("Max size is 5MB");

         //check for MIME type
         if(in_array($file_type, $allowed_ext)){
            //check if file already exists
            if(file_exists("uploads/$file_name")){
                echo "<p class='text-danger'> $file_name already exists, choose another name </p>";
            } else {
                move_uploaded_file($_FILES["avatar"]["tmp_name"], $destination);
            }
        } else {
            echo "<p class='text-danger'> There was an error with your uploading, please try again</p>";
        }
    }else {
        echo 'Error: '.$_FILES["avatar"]["error"];
       }

        $isRegistered =$user->insertUser($username, $name, $em, $pass, $destination);
        if($isRegistered){
           header('Location: ../viewrecords.php');
        }else {
            include 'includes/error.php'; 
        }     
}
