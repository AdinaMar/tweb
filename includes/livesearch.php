<?php
require_once '../db/conn.php';

if(isset($_POST['input'])){
    $input = $_POST['input'];

    $result = $user->getUserByName($input);
    foreach($result as $r){
    ?>
    <a class="search-links" href="viewemployee.php?id=<?= $r['id'] ?>"><?= $r['name']?></a>
    <?php
    }
}
?>