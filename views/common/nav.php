<?php
//TODO: Change this
$views_dir = 'http://localhost:2431/flick-yak/views/';
$root_dir = 'http://localhost:2431/flick-yak/';

//nav links
$home = $root_dir. 'index.php';
$all_movies_link = $views_dir . 'public/all_movies.php';
$member_register = $views_dir . 'public/member_register.php';
$update_member_profile = $views_dir . 'member/update_member_profile.php';
$logout = $views_dir . 'public/logout.php';
$add_movie= $views_dir.'admin/add_movie.php';
$all_users= $views_dir.'admin/all_users.php'; 

echo '<div><h1><a href="' . $home . '">Flick Yak</a></h1><hr></div><nav>';
if (!isset($_SESSION['username'])) {
    require_once __DIR__ . '/../forms/login_form.php';
} else {
    echo '<p>Welcome, ' . $_SESSION['username'] . ' [<a href="'.$logout.'">log out</a>]</p>';
}

echo '<ul>';
echo '<li><input type="text" name="search_movies"><input type="submit" value="Search"></li>';
echo '<li><a href="' . $all_movies_link . '">View All Movies</a></li>';
if (isset($_SESSION['username'])) {
    echo '<li><a href="' . $update_member_profile . '">Update My Profile</a></li>';
}

if (isset($_SESSION['access_level']) && $_SESSION['access_level'] == 'admin') {
    echo '<li><a href="'.$add_movie.'">Add Movie</a></li>
            <li><a href="'.$all_users.'">List All Users</a></li>';
}
echo '</ul>';

if (!isset($_SESSION['username'])) {
    echo '<p>You cannot discuss or rate movies until you are logged in. <br><a href="'
        . $member_register . '">Register</a> an account now!</p>';
}

echo '<hr></nav>';
