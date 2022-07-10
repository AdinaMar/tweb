<?php 
$title = 'Edit Record';
require_once 'includes/header.php';
//check if there's a session
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
include_once 'includes/sidebar.php';

if(!isset($_GET['id'])){
    include 'includes/error.php';
    header('Location: viewrecords.php');
} else {
    $id = $_GET['id'];
    $employee = $crud->getEmployeeDetails($id);
    $results = $crud->getOffices();
?>

<div class="edit">
<h1>Edit <?php echo $employee['name']; ?></h1>
<form method="POST" action="includes/edituser.php">
<input required type="hidden" name="id" value="<?php echo $employee['id'] ?>"/>
<div class="form-input">
    <label for="name">Name</label>
    <input type="text" name="name" class="input" id="name" required placeholder="Name" value="<?php echo $employee['name'] ?>">
</div>  
<div class="form-input">
    <label for="email">Email</label>
    <input type="email" name="email" class="input" id="email" required placeholder="Email" value="<?php echo $employee['email'] ?>">
</div>  
<div class="selects">
<div class="form-input">
    <label for="role">Role</label>
    <select name="role" id="role">
    <option value="admin">Admin</option>
    <option value="user">User</option>
    </select>
</div>
<div class="form-input">
    <label for="office">Office</label>
    <select name="office" id="office">
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
    <option value="<?php echo $r['office_id'];?>" <?php if($r['office_id'] == $employee['office_nr']) echo 'selected'?>>
    <?php echo $r['office_name']; ?>
    </option>
    <?php } ?>
    </select>
</div> 
</div>       
<button type="submit" name="submit" class="primary">Save Changes</button>    
</form>
</div>
<?php } ?>
<?php 
require_once 'includes/footer.php';
?>