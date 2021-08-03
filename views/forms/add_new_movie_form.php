<form name="add_new_movie" action="new_movie.php" method="post" onsubmit="return validateNewMovie()">
    <p>* indicates required fields</p>
    <fieldset>
        <legend>Movie Details</legend>
        <label>*Movie name:</label><input type="text" name="movie_name">
        <label>*Release year:</label><input type="number" min="1920" max="2021" value="2000" name="year">
        <label>*Director:<input type="text" name="director"/></label>
        <label>*Writers:</label><input type="text" name="writers">
        <label>*Duration:</label><input type="number" value="120" name="duration">
        <label>Plot Summary:<input type="text" name="plot_sum"/></label>
        <br>
        <input type="submit" name="add_new_movie_submit" value="Submit" />
    </fieldset>
</form>