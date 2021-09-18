<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    require '../errors/404.php';
    exit();
};

echo '<form id="form-container" name="add_new_movie" action="new_movie.php" method="post" onsubmit="return validateNewMovie()">
<fieldset >
        <legend>Movie Details</legend>
        <span><label for="name">*Movie name:</label><input id="name"type="text" name="movie_name" value="Test Movie Name">&nbsp;</span>
        <span><label for="year">*Release year:</label><input id="year"type="number" min="1920" max="2021" value="2000" name="year">&nbsp;</span>
        <span><label for="dir">*Director:</label><input id="dir"type="text" name="director" value="Test Director"/>&nbsp;</span>
        <span><label for="writer">*Writers:</label><input id="writer"type="text" name="writers" value="Test Writers">&nbsp;</span>
        <span><label for="duration">*Duration:</label><input id="duration"type="number" value="120" name="duration">&nbsp;</span>
        <span><label for="plot">Plot Summary:</label><textarea id="plot" name="plot_sum" />Test Plot Summary</textarea>&nbsp;</span>
        <p>* indicates required fields</p>
        <input type="submit" name="add_new_movie_submit" value="Submit" />
    </fieldset>
</form>';
