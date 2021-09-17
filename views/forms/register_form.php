<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    require '../errors/404.php';
    exit();
};

echo '<form name="register" action="member_register_h.php" method="post" onsubmit="return validateMemberRegistration()">
    <p>* indicates required fields</p>
    <fieldset>
        <legend>Member Credentials</legend>
        <label>*Username:</label><input type="text" name="username" value="testuser">
        <label>*Password:</label><input type="password" name="pass" value="12345">
        <label>*Confirm Password:<input type="password" name="confirm_pass" value="12345"/></label>
    </fieldset>
    <fieldset>
        <legend>Member Details</legend>
        <label>Real Name:</label><input type="text" name="real_name" value="Test User">
        <label>*Email Address:</label><input type="text" name="email" value="test.user@nowhere.com">
        <label>*Date of Birth:<input type="date" name="dob" value="1987-02-18"/></label>
        <br>
        <input type="submit" name="submit" value="Submit" />
    </fieldset>
</form>';
