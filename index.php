<?php
$title = 'Login';
require_once 'includes/header.php';
?>
    <div class="home-container">
    <main>
        <div class="logo">iOffice</div>
        <h1>Welcome!</h1>        
        <form action="includes/login.php" method="post" id="login-form">
        <p>Login to your account</p>
        <div class="form-input">
            <label for="username">Username</label>
            <input type="text" name="username" class="username"  placeholder="Username">            
            <i class="fa-solid fa-circle-exclamation"></i>
            <small></small>
        </div>           
        <div class="form-input">
        <label for="password">Password</label>
        <input type="password" class="password" name="password"  placeholder="Password">
        <i class="fa-solid fa-circle-exclamation"></i>
        <small></small>
        </div>
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>Don't have an account? <a href="register.php">Register now</a></p>
        </form>
    </main>
    <div class='login-image'></div>
    </div>
<?php
include_once 'includes/footer.php';
?>