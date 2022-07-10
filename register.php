<?php
$title = 'Register';
require_once 'includes/header.php';
?>
<div class="register-container">
    <main>
        <div class="logo">iOffice</div>
        <h1>Welcome!</h1>
        <p>Register new account</p>
        <form action="includes/registeruser.php" method="post" enctype="multipart/form-data" id="register-form">
            <div class="form-input">
                <label for="username">Username</label>
                <input type="text" name="username" class="username"  placeholder="Username">
                <i class="fa-solid fa-circle-exclamation"></i>
                <small></small>
            </div>
            <div class="form-input">
                <label for="name">Name</label>
                <input type="text" name="name" class="name"  placeholder="Name">
                <i class="fa-solid fa-circle-exclamation"></i>
                <small></small>
            </div>
            <div class="form-input">
                <label for="email">Email</label>
                <input type="email" name="email"  class="email"  placeholder="Email">
                <i class="fa-solid fa-circle-exclamation"></i>
                <small></small>
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input type="password" class="password" name="password"  placeholder="Password">
                <i class="fa-solid fa-circle-exclamation"></i>
                <small></small>
            </div>
            <div class="form-input">
                <label for="avatar" class="custom-file-label">Profile image</label>
                <input type="file" accept="image/*" class="input" id="avatar" name="avatar">
            </div>
            <div class="submit">
                <input type="submit" class="primary" name="submit" value="register now" class="form-btn">
                <p>Already have an account? <a href="index.php">Login now</a></p>
            </div>
        </form>
    </main>
</div>
<?php
include_once 'includes/footer.php';
?>