<form name="update" action="update_member.php" method="post" onsubmit="">
    <p>* indicates required fields</p>
    <fieldset>
        <legend>Member Credentials</legend>
        <label>*Password:</label><input type="password" name="pass">
        <label>*Confirm Password:<input type="password" name="confirm_pass"/></label>
    </fieldset>
    <fieldset>
        <legend>Member Details</legend>
        <label>Real Name:</label><input type="text" name="real_name">
        <label>*Email Address:</label><input type="email" name="email">
        <br>
        <input type="submit" name="submit" value="Submit" />
    </fieldset>
</form>