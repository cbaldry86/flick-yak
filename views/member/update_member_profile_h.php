<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<body>
<?php

if (isset($_POST['submit'])) {

    $errorMessages = [];

    // [pass] => 
    if (strlen($_POST['pass']) < 5) {
        $errorMessages[] = 'Password must be at least 6 characters long.';
    }

    // [confirm_pass] => 
    if ($_POST['pass'] != $_POST['confirm_pass']) {
        $errorMessages[] = 'Password does not match confirmation.';
    }

    // [real_name] =>
    if (strlen($_POST['real_name']) > 100){
        $errorMessages[] = 'Real name is too long. A maximum of 100 characters.';
    } 

    // [email] => 
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || empty($_POST['email'])) {
        $errorMessages[] = 'Email is not a valid email address';
    }

    if (strlen($_POST['email']) > 40) {
        $errorMessages[] = 'Email is too long. A maximum of 40 characters allowed';
    }

    if ($errorMessages) {
        echo '<h2>Failed to validate data</h2><p> Please review the following:</p>';
        foreach ($errorMessages as $item) {
            echo '<p>' . $item . '</p>';
        }

        echo '<a href="javascript: window.history.back()">Return to form</a>';
    }else {
        //Process Form 
        echo '<h3>Form Submitted successfully!</h3>';
    }

}else{
    echo 'Please submit the <a href="update_member_profile.php">form</a>.';
}
?>
</body>
</html>