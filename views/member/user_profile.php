<?php
session_start();

if (!isset($_SESSION['access_level'])) {
    require '../errors/401.php';
    echo '<script>console_log(\'Invalid Permissions.\');</script>';
    exit;
}

require '../../src/connect_db.php';
if (!isset($_GET['id'])) {
    require '../errors/404.php';
    echo '<script>console_log(\'Invalid User ID.\');</script>';
    exit;
}

$sql = "SELECT
    user.username,
    user.real_name,
    user.dob,
    user.email,
    user.access_level,
    user.profile_image,
    user.fav_movie_id,
    movie.movie_name,
    movie.release_year
FROM
    user
LEFT OUTER JOIN movie ON movie.movie_id = USER.fav_movie_id
WHERE
    username = ?";

$count_sql = "SELECT 
    COUNT(*) AS total_admins
FROM
    user
WHERE
    access_level = \"admin\"";

$stmt = $db->prepare($sql);
$stmt->execute([$_GET['id']]);
$user = $stmt->fetch();

$stmt = $db->query($count_sql);
$admins = $stmt->fetch();

if (!$user) {
    require '../errors/404.php';
    echo '<script>console_log(\'User ID does not exist \');</script>';
    exit;
}

$title = 'Profile';
$script = '/flick-yak/scripts/main.js';
$css = '/flick-yak/css/main.css';
$year = str_split($user['dob'], 4);
$promoteLink = ' <a href="#" id="fav-remove" onclick="profileApis.promoteToAdmin(\''
    . $_GET['id'] . '\')">(Promote to Admin)</a>';

$demoteLink = ' <a href="#" id="fav-remove" onclick="return profileApis.demoteToMember(\''
    . $_GET['id'] . '\', \'' . $admins['total_admins'] . '\')">(Demote to Member)</a>';

$favouriteLink = isset($user['fav_movie_id']) ? '<a href="../public/movie_details.php?id='
    . $user['fav_movie_id'] . '">' . $user['movie_name'] . ' (' . $user['release_year'] . ')</a>'
    : 'No Favourite Movies Set';

require_once '../common/head.php';
require_once '../common/nav.php';
echo '<h1>Details of "' . $user['username'] . '"</h1>';
echo '<img src="../images/' . $user['profile_image'] . '" width="200" >';
echo '<table><tbody>';
echo '<tr><th>Real Name:</th><td>' . $user['real_name'] . '</td></tr>';
echo '<tr><th>Email Address:</th><td>' . $user['email'] . '</td></tr>';
echo '<tr><th>Year of Birth:</th><td>' . $year[0] . '</td></tr>';
echo '<tr><th>Access Level:</th><td>' . ucfirst($user['access_level']);

if ($_SESSION['access_level'] == 'admin' && $user['access_level'] == 'member') {
    echo  $promoteLink;
} elseif ($_SESSION['access_level'] == 'admin' && $user['access_level'] == 'admin') {
    echo $demoteLink;
}
echo '</td></tr>';
echo '<tr><th>Favourite Movie:</th><td>';
echo $favouriteLink . '</td></tr>';
echo '</tbody></table>';

echo '</div></body></html>';
?>
<a href="#"></a>