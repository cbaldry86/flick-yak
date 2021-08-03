<form name="register" action="register.php" method="post" onsubmit="return validateMemberRegistration()">
    <p>* indicates required fields</p>
    <fieldset>
        <legend>Member Credentials</legend>
        <label>*Username:</label><input type="text" name="username">
        <label>*Password:</label><input type="password" name="pass">
        <label>*Confirm Password:<input type="password" name="confirm_pass"/></label>
    </fieldset>
    <fieldset>
        <legend>Member Details</legend>
        <label>Real Name:</label><input type="text" name="real_name">
        <label>*Email Address:</label><input type="email" name="email">
        <label>*Date of Birth:<input type="date" name="dob"/></label>
        <br>
        <input type="submit" name="submit" value="Submit" />
    </fieldset>
</form>