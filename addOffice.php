<?php
$title = 'Add new office';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
include_once 'includes/sidebar.php';

?>
<div class="add-office-container">
    <main>
        <h1>Add Office</h1>      
        <form action="includes/addnewoffice.php" method="post" id="add-office-form"> 
        <div class="form-input">
            <label for="username">Name</label>
            <input type="text" name="name" class="name"   placeholder="Name">
            <i class="fa-solid fa-circle-exclamation"></i>
                <small></small>
        </div>         
        <div class="form-input">
            <label for="address">Address</label>
            <textarea class="address" name="address" rows="4" cols="50" placeholder="Address" ></textarea>
            <i class="fa-solid fa-circle-exclamation"></i>
            <small></small>
        </div>  
        <div class="submit">
            <input type="submit" class="primary" name="submit" value="Add office" class="form-btn">
        </div>
    </form>
    </main>
    </div>
<?php
include_once 'includes/footer.php';
?>