<?php
$title = 'Edit Record';
require_once 'includes/header.php';
//check if there's a session
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
include_once 'includes/sidebar.php';

if (!isset($_GET['id'])) {
    include 'includes/error.php';
    header('Location: viewrecords.php');
} else {
    $id = $_GET['id'];
    $employee = $crud->getEmployeeDetails($id);
?>

    <div class="view-employee">
        <img class="img-thumbnail rounded-circle" width="200" height="200" src="<?php echo empty($employee["image"]) ? "images/username.png" : $employee["image"] ?>" alt="profile image" />
        <div class="card">
            <h2>
                <?php echo $employee["name"]; ?>
            </h2>
            <h3>
                <?php echo $employee["email"]; ?>
            </h3>
            <p>
                <?php echo $employee["user_type"]; ?>
            </p>
        </div>

        <a href="viewrecords.php?" class="btn btn-info">Back to List</a>
        <?php
        if ($_SESSION['type'] == 'admin') {
        ?>
            <a href="edit.php?id=<?php echo $employee['id'] ?>" class="primary">Edit</a>
            <a onclick="return confirm(`Are you sure you want to delete <?php echo $employee['name'] ?>?`);" href="delete.php?id=<?php echo $employee['id'] ?>" class="secondary">Delete</a>

        <?php } ?>

    <?php } ?>
    </div>
    <?php
    require_once 'includes/footer.php';
    ?>
    </div>