<?php 
require_once 'auth_check.php';
require_once 'db/conn.php';

$result = $user->getUser($_SESSION['username']);

?>

<aside class="sidebar">
    <div class="logo-sidebar">office</div>
    <img src="<?php echo empty($result["image"]) ? "images/username.png" : $result["image"]?>" alt='profile img' />
    <h2><?php echo $result['name'] ?></h2>
    <p><?php 
    if($result['user_type'] == 'user'){
        echo 'Employee';
    }else {
        echo 'Admin';
    } ?></p>

    <ul>
        <a href="viewrecords.php"><i class="fa-solid fa-table-cells"></i><li> View Records</li></a>
        <a href="viewoffices.php"><i class="fa-regular fa-building"></i><li>Office Status</li></a>
        <a href="viewusers.php"><i class="fa-solid fa-users"></i><li>User Status</li></a> 
        <a href="articles.php"><i class="fa-solid fa-users"></i><li>Top News</li></a>         
        <a href="includes/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><li>Logout</li></a>
    </ul>
</aside>