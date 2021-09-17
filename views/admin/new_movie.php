<?php
session_start();

if (!isset($_SESSION['access_level']) || !$_SESSION['access_level'] == 'admin') {
    require '../errors/401.php';
    exit;
}

$title = 'New Movie';
$script = '../../scripts/main.js';
$css = '../../css/main.css';
require_once '../common/head.php';
require_once '../common/nav.php';

if (isset($_POST['add_new_movie_submit'])) {
    $errorMessages = [];

    if (empty($_POST['movie_name'])) {
        $errorMessages[] = 'The movie name is empty.';
    }

    if (strlen($_POST['movie_name']) > 100) {
        $errorMessages[] = 'The movie name is too long. A maximum of 100 characters.';
    }

    if (empty($_POST['year'])) {
        $errorMessages[] = 'Release year is empty';
    } else {
        $currentYear = date("Y");
        $year = $_POST['year'];
        if ($currentYear < $year) {
            $errorMessages[] = 'Release year is from the future. Are you a time traveler?';
        } else if (1895 > $year) {
            $errorMessages[] = 'Release year is too old.';
        }
    }

    if (empty($_POST['director'])) {
        $errorMessages[] = 'The director name is empty.';
    }

    if (strlen($_POST['director']) > 100) {
        $errorMessages[] = 'The director name is too long. A maximum of 100 characters.';
    }

    if (empty($_POST['writers'])) {
        $errorMessages[] = 'The writers name is empty.';
    }

    if (strlen($_POST['writers']) > 100) {
        $errorMessages[] = 'The writers name is too long. A maximum of 100 characters.';
    }

    if (empty($_POST['duration'])) {
        $errorMessages[] = 'The duration is empty.';
    }

    if ($_POST['duration'] < 0) {
        $errorMessages[] = 'The duration is a negative. Please use a positive number';
    }

    if (strlen($_POST['plot_sum']) > 10000) {
        $errorMessages[] = 'The plot summary name is too long. A maximum of 10,000 characters.';
    }

    if ($errorMessages) {
        echo '<h2>Failed to validate data</h2><p> Please review the following:</p>';
        foreach ($errorMessages as $item) {
            echo '<p>' . $item . '</p>';
        }

        echo '<a href="javascript: window.history.back()">Return to form</a>';
    } else {
        //Process Form
        require __DIR__ . '/../../src/connect_db.php';

        $stmt = $db->prepare("SELECT * FROM movie WHERE movie_name = ? AND release_year = ?");
        $success = $stmt->execute([$_POST['movie_name'], $_POST['year']]);
        $results = $stmt->fetch();

        if ($results && $success) {
            echo '<h3>Failed To Add New Movie</h3>';
            echo '<p>Movie already exists please go back and try a different movie name and release year combination </p>';
            echo '<a href="javascript: window.history.back()">Return to form</a>';
        } else {
            $stmt = $db->prepare("INSERT INTO movie (movie_name, release_year, director, writers, duration, summary)" .
                " VALUES (?, ?, ?, ?, ?, ?)");
            $success = $stmt->execute([$_POST['movie_name'], $_POST['year'], $_POST['director'], $_POST['writers'], $_POST['duration'],  $_POST['plot_sum']]);

            if ($success) {
                echo '<h3>New Movie Submitted Successfully!</h3>';
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
