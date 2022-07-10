<?php
$title = 'Users';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
include_once 'includes/sidebar.php';

$result = $crud->getEmployees();

?>
<div class="offices-container">
<p><?php echo $title ?></p>
<h1>Users</h1>
<div class="users-container">
    <?php 
        while($r=$result->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="user-card">
    <div class="generics">
    <img class="rounded-circle" src="<?php echo empty($r["image"]) ? "images/username.png" : $r["image"]?>" alt="profile image"/>
    <span><?php echo $r['name']; ?></span>
    </div>
        <div class="user-info">
            <h2><p>Office:</p><?php echo $r['office_name']; ?></h2>
            <h3><p>Email:</p><?php echo $r['email']; ?></h3>
            <h3><p>Role:</p><?php echo $r['user_type']; ?></h3>            
        </div>        
    </div>
    <?php } ?>
</div>


</div>
<?php
include_once 'includes/footer.php';
?>