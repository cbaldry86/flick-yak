<?php
$title = 'Registration';
$script = '/flick-yak/scripts/main.js';
$css = '/flick-yak/css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';

if (isset($_POST['submit'])) {

    $errorMessages = [];

    if (empty($_POST['username'])) {
        $errorMessages[] = 'Username is empty.';
    }

    if (strlen($_POST['username']) > 20) {
        $errorMessages[] = 'Username is too long. A maximum of 20 characters.';
    }

    if (strlen($_POST['pass']) < 5) {
        $errorMessages[] = 'Password must be at least 6 characters long.';
    }

    if ($_POST['pass'] != $_POST['confirm_pass']) {
        $errorMessages[] = 'Password does not match confirmation.';
    }

    if (strlen($_POST['real_name']) > 100) {
        $errorMessages[] = 'Real name is too long. A maximum of 100 characters.';
    }

    $sanitized_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (empty($_POST['email'] && $sanitized_email == $_POST['email'])) {
        $errorMessages[] = 'Email is not a valid email address';
    }

    if (strlen($_POST['email']) > 40) {
        $errorMessages[] = 'Email is too long. A maximum of 40 characters allowed';
    }

    if (empty($_POST['dob'])) {
        $errorMessages[] = 'Date of birth is empty';
    } else {
        $todaysDate = date_create();
        $dob = date_create($_POST['dob']);
        $diff = $dob->diff($todaysDate);
        if ($diff->y < 14) {
            $errorMessages[] = 'Date of birth is too young needs to be 14 years or over';
        }
    }

    if (!empty($_FILES['profile_image'])){
        $extensions= array("jpeg","jpg","png", "gif");
        $imageName = $_FILES['profile_image']['name'];
        $size =$_FILES['profile_image']['size'];

        if($size > 2097152 && $size > 0){
            $errorMessages[]='File size must be 2 MB or less';
        }
    }

    if ($errorMessages) {
        echo '<h1>Failed to validate data</h1><p> Please review the following:</p>';
        foreach ($errorMessages as $item) {
            echo '<p>' . $item . '</p>';
        }

        echo '<a href="javascript: window.history.back()">Return to form</a>';
    } else {
        //Process Form
        require '../../src/connect_db.php';
        $stmt = $db->prepare("SELECT username FROM user WHERE username = ?");
        $success = $stmt->execute([$_POST['username']]);
        $results = $stmt->fetch();

        if ($results && $success) {
            echo '<h3>Failed To Register</h3>';
            echo '<p>Username already exists please try logging in or go back and try a different username </p>';
            echo '<a href="javascript: window.history.back()">Return to form</a>';
        } else {
            $stmt = $db->prepare("INSERT INTO user(username, real_name, email, dob, password, profile_image)" .
                " VALUES (?, ?, ?, ?, ?, ?)");
                if (isset($imageName)) {
                    $success = $stmt->execute([$_POST['username'], $_POST['real_name'], $_POST['email'], $_POST['dob'],  $_POST['pass'], $imageName]);
                    $image_path = '../images/'.basename($imageName);
                    move_uploaded_file($_FILES['profile_image']['tmp_name'], $image_path);
                }else {
                    $success = $stmt->execute([$_POST['username'], $_POST['real_name'], $_POST['email'], $_POST['dob'],  $_POST['pass'], 'profile_placeholder.png']);
                }

            if ($success) {
                echo '<h3>Form Submitted successfully!</h3>';
                echo '<p>Please try Signing in now</p>';
                echo '<a href="../../index.php">Return home</a>.';
            } else {
                echo '<h3>Something went wrong</h3>';
                echo '<p>Please try again <a href="javascript: window.history.back()">return to form</a></p>';
            }
        }
    }
} else {
    echo 'Please submit the <a href="member_register.php">form</a>.';
}

echo '</div></body></html>';
