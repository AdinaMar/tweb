<?php
$title = 'Articles';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/conn.php';
include_once 'includes/sidebar.php';
?>
<div class="articles-container">
    <p><?php echo $title ?></p>
    <h1>Top Articles</h1>
    <div class="loader"></div>
    <div id="articles"></div>
</div>

<?php
include_once 'includes/footer.php';
?>