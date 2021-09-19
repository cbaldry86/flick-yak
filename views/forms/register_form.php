<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    require '../errors/404.php';
    exit();
};

echo '<form id="form-container" name="register" action="member_register_h.php" method="post" onsubmit="return validateMemberRegistration()" enctype="multipart/form-data">
    <fieldset>
        <legend>Member Credentials</legend>
        <span><label>*Username:</label><input type="text" name="username" ></span>
        <span><label>*Password:</label><input type="password" name="pass" ></span>
        <span><label>*Confirm Password:</label><input type="password" name="confirm_pass"/></span>
    </fieldset>
    <fieldset>
        <legend>Member Details</legend>
        <span><label>Real Name:</label><input type="text" name="real_name" ></span>
        <span><label>*Email Address:</label><input type="text" name="email" ></span>
        <span><label>*Date of Birth:</label><input type="date" name="dob" /></span>
        <span><label>Profile Picture:</label><input type="file" name="profile_image" accept="image/png, image/gif, image/jpeg" onchange="loadImage(event)" /></span>
        <img id="output" width="200" />
        <p>* indicates required fields</p>
        <input type="submit" name="submit" value="Submit" />
    </fieldset>
</form>';
