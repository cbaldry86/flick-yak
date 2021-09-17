<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('Location: ../errors/404.php');
    exit();
};

$views_dir = '/flick-yak/views/';
$root_dir = '/flick-yak/';

//nav links
$home = $root_dir . 'index.php';
$all_movies_link = $views_dir . 'public/all_movies.php';
$member_register = $views_dir . 'public/member_register.php';
$update_member_profile = $views_dir . 'member/update_member_profile.php';
$logout = $views_dir . 'common/logout.php';
$add_movie = $views_dir . 'admin/add_movie.php';
$all_users = $views_dir . 'admin/all_users.php';

echo '<div class="header-container"><span><a href="' . $home . '">Flick Yak</a></span>';
echo '</div>';

echo '<div class="nav">';
if (!isset($_SESSION['username'])) {
    echo '<div id="overlay">';
    echo '<div id="login-container">';
    require_once __DIR__ . '/../forms/login_form.php';
    echo '</div></div>';
    echo '<button class="sign-in-button"onclick="on()">Sign In</button>';    
} else {
    echo '<div class="welcome-tag">Welcome, ' . $_SESSION['username'] . ' [<a href="' . $logout . '">Log Out</a>]</div>';
}
require_once __DIR__ . '/../forms/search_form.php';
echo '<a href="' . $all_movies_link . '">View All Movies</a>';
if (isset($_SESSION['username'])) {
    echo '<a href="' . $update_member_profile . '">Update My Profile</a>';
}

if (isset($_SESSION['access_level']) && $_SESSION['access_level'] == 'admin') {
    echo '<a href="' . $add_movie . '">Add Movie</a>
    <a href="' . $all_users . '">List All Users</a>';
}
echo '</div>';
if (!isset($_SESSION['username'])) {
    echo '<div class="register-message">';
    echo '<span>You cannot discuss or rate movies until you are logged in. <br><a href="'
        . $member_register . '">Register</a> an account now!</span>';
    echo '</div>';
}
echo '<div class="content">';

// echo '<ul>';
// echo '<li><input type="text" name="search_movies"><input type="submit" value="Search"></li>';
// echo '<li><a href="' . $all_movies_link . '">View All Movies</a></li>';
// if (isset($_SESSION['username'])) {
//     echo '<li><a href="' . $update_member_profile . '">Update My Profile</a></li>';
// }

// if (isset($_SESSION['access_level']) && $_SESSION['access_level'] == 'admin') {
//     echo '<li><a href="' . $add_movie . '">Add Movie</a></li>
//             <li><a href="' . $all_users . '">List All Users</a></li>';
// }
// echo '</ul>';

// if (!isset($_SESSION['username'])) {
//     echo '<p>You cannot discuss or rate movies until you are logged in. <br><a href="'
//         . $member_register . '">Register</a> an account now!</p>';
// }

// echo '<hr></nav>';