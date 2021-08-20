<form name="login" action="<?php echo $views_dir.'/common/login.php' ?>" method="post" onsubmit="">
    <fieldset>
        <label>Username:</label><input type="text" name="username_login" value="testuser">
        <label>Password:</label><input type="password" name="pass_login" value="12345">
        <input type="submit" name="login_submit" value="Login" />
        <br>
        <a href="views/public/member_register.php">Click here to sign up</a>
    </fieldset>
</form>