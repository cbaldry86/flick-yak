<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    require '../errors/404.php';
    exit();
};

echo '<form id="form-container" name="register" action="member_register_h.php" method="post" onsubmit="return validateMemberRegistration()" enctype="multipart/form-data">
    <fieldset>
        <legend>Member Credentials</legend>
        <span><label>*Username:</label><input type="text" name="username" value="testuser"></span>
        <span><label>*Password:</label><input type="password" name="pass" value="12345"></span>
        <span><label>*Confirm Password:</label><input type="password" name="confirm_pass" value="12345"/></span>
    </fieldset>
    <fieldset>
        <legend>Member Details</legend>
        <span><label>Real Name:</label><input type="text" name="real_name" value="Test User"></span>
        <span><label>*Email Address:</label><input type="text" name="email" value="test.user@nowhere.com"></span>
        <span><label>*Date of Birth:</label><input type="date" name="dob" value="1987-02-18"/></span>
        <span><label>Profile Picture:</label><input type="file" name="profile_image" accept="image/png, image/gif, image/jpeg" onchange="loadImage(event)" /></span>
        <img id="output" width="200" />
        <p>* indicates required fields</p>
        <input type="submit" name="submit" value="Submit" />
    </fieldset>
</form>';
