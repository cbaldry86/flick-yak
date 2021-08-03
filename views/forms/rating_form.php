<form action="" method="post"></form>
<fieldset>
    <legend>Rate Movie</legend>
    <select name="rating">
            <option value="" selected disabled>Select a Rating</option>
            <?php        
            for ($i=1; $i < 11; $i++) { 
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>        
    </select>
    <input type="hidden" id="movie_id" name="movie_id" value="<?php $_GET['id'] ?>">
    <input type="submit" name="rate_submit"value="Rate">
</fieldset>