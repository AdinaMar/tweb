<?php
include_once 'session.php';
require_once '../db/conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];

    $result = $user->getUser($username); 

    if(!password_verify($password, $result['password'])){
        echo '<div class="alert">Username or Password is incorrect! Please, try again. </div>';
    } else {
        //SET SESSION FOR THE USER
    $_SESSION['username'] = $result['username'];
    $_SESSION['userid'] = $result['id']; 
    $_SESSION['type'] = $result['user_type'];
        header('Location: ../viewrecords.php');
    }
}
