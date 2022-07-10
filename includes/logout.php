<?php
include_once 'session.php';
?>
<?php 
//DESTROY THE SESSION
session_destroy();
header('Location: ../index.php');
?>