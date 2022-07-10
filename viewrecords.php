<?php
$title = 'View Users';
require_once 'includes/header.php';
//check if there's a session
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
include_once 'includes/sidebar.php';

$result = $crud->getEmployees();
$count = $user->countUsers();
?>
<div class="view-records">
<p><?= $title ?></p>
<h1>Users Management</h1>
<div class="search-add-user">
<div class="search-user">
    <p>Search user</p>
    <input class="input search" id="search-user" placeholder="Search employee" />
</div>

<?php
    if($_SESSION['type'] == 'admin'){
?> 
<button class="primary"><a href="adduser.php">+ Add user</a></button>
<?php } ?>
</div>
<div id="search-result"></div>
<p class="users-length">Users: <span><?php echo $count['num']; ?></span></p>
<table>
    <thead>
        <tr>
        <th class="id-table">ID</th>
        <th>Name </th>
        <th class="email-table">Email </th>
        <th class="role-table">Role</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <?php 
        while($r=$result->fetch(PDO::FETCH_ASSOC)){            
        ?>
        <tr id="user-row<?= $r['id']?>">             
            <td class="id-table"> <?= $r['id']?></td>
            <td><?= $r['name']?></td>
            <td class="email-table"><?= $r['email']?></td>
            <td class="role-table"><?= $r['user_type']?></td>
            <?php 
            if($_SESSION['type'] == 'admin'){
            ?> 
            <td><a href="viewemployee.php?id=<?= $r['id']?>"><i class="fa-regular fa-user"></i></a>
            <a href="edit.php?id=<?= $r['id']?>"><i class="fa-solid fa-pen"></i></a>
            <button onclick="deleteUser(<?= $r['id']?>)"><i class="fa-solid fa-ban"></i></button>
            <?php 
            }else {
            ?> 
            <td><a href="viewemployee.php?id=<?= $r['id']?>"><i class="fa-regular fa-user"></i></a> </td>
            <?php
            } 
            ?>
            
        </td>
        </tr>        
        <?php } ?>
    </tr>
    </tbody>
</table>
</div>
<?php
include_once 'includes/footer.php';
?>