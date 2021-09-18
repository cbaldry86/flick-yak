<?php

if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    require '../errors/404.php';
    exit();
};

echo '<form id="form-container" name="update" action="update_member_profile_h.php" method="post" onsubmit="return validateMemberProfileUpdate()">
    <fieldset>
        <legend>Member Credentials</legend>
         <span><label>*Password:</label><input type="password" name="pass"></span>
         <span><label>*Confirm Password:</label><input type="password" name="confirm_pass"/></span>
    </fieldset>
    <fieldset>
        <legend>Member Details</legend>
        <span><label>Real Name:</label><input type="text" name="real_name"></span>
        <span><label>*Email Address:</label><input type="email" name="email"></span>
        <p>* indicates required fields</p>
        <input type="submit" name="submit" value="Submit" />
    </fieldset>
</form>';
