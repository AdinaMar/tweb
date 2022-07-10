<?php
$title = 'Offices';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
include_once 'includes/sidebar.php';

$result = $crud->getOffices();

?>
<div class="offices-container">
    <p><?php echo $title ?></p>
    <h1>Office Management</h1>
    <div class="search-add-user">
        <?php
        if ($_SESSION['type'] == 'admin') {
        ?>
            <button class="primary"><a href="addOffice.php">+ Add office</a></button>
        <?php } ?>
    </div>
    <div class="office-container">
        <?php
        while ($r = $result->fetch(PDO::FETCH_ASSOC)) {
            $count = $user->countUsersPerOffice($r['office_id']);
        ?>
            <div class="office-card" id="office-card<?= $r['office_id']?>">
                <img src="images/office.svg" alt="office" />
                <div>
                    <h2><?php echo $r['office_name']; ?></h2>
                    <h3><?php echo $r['address']; ?></h3>
                    <button class="primary" <?php echo ($count > 0 ? '' : 'disabled')?> onclick="deleteOffice(<?= $r['office_id'] ?>)">Delete</button>
                </div>
            </div>
        <?php } ?>
    </div>


</div>
<?php
include_once 'includes/footer.php';
?>