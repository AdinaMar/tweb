<?php
$title = 'Add new user';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
include_once 'includes/sidebar.php';

$results = $crud->getOffices();
?>
<div class="add-user-container">
    <main>
        <h1>Add user</h1>
        <form action="includes/add.php" method="post" enctype="multipart/form-data" id="add-user-form">
            <div class="form-input">
                <label for="username">Username</label>
                <input type="text" name="username" class="username" placeholder="Username">
                <i class="fa-solid fa-circle-exclamation"></i>
                <small></small>
            </div>
            <div class="form-input">
                <label for="name">Name</label>
                <input type="text" name="name" class="name" placeholder="Name">
                <i class="fa-solid fa-circle-exclamation"></i>
                <small></small>
            </div>
            <div class="form-input">
                <label for="email">Email</label>
                <input type="email" name="email" class="email" placeholder="Email">
                <i class="fa-solid fa-circle-exclamation"></i>
                <small></small>
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input type="password" class="password" name="password" placeholder="Password">
                <i class="fa-solid fa-circle-exclamation"></i>
                <small></small>
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
                        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?= $r['office_id']; ?>">
                                <?= $r['office_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-input">
                <label for="avatar" class="custom-file-label">Profile image</label>
                <input type="file" accept="image/*" id="avatar" name="avatar">
            </div>
            <div class="submit">
                <input type="submit" class="primary" name="submit" value="Add user" class="form-btn">
            </div>
        </form>
    </main>
</div>
<?php
include_once 'includes/footer.php';
?>