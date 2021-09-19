<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    require '../errors/404.php';
    exit();
};

echo '<form name="login" action="' . $views_dir . 'common/login.php' . '" method="post" onsubmit="return validateLogin()">
        <div class="close-overlay-button"onclick="off()">X</div>
        <label>Username:<input type="text" name="username_login" ></label>
        <br>
        <label>Password:<input type="password" name="pass_login" ></label>
        <br>
        <input type="submit" name="login_submit" value="Login" />
        <br>
        <span>Click here to <a href="' . $views_dir . 'public/member_register.php">Sign Up</a></span>
</form>';
