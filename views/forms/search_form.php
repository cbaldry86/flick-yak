<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    require '../errors/404.php';
    exit();
};

echo '<form name="search" action="' . $views_dir . 'public/search_results_list.php' . '" method="get" onsubmit="">';
echo '<div class="search-bar"><input type="submit" value="Search"><input type="text" name="search_movies"></div>';
echo '</form>';
