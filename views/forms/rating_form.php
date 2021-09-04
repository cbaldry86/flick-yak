<?php
echo '<form name="rating" action="" method="post">
<fieldset>
    <legend>Rate Movie</legend>
    <select name="rating">
            <option value="" selected disabled>Select a Rating</option>';
for ($i = 1; $i < 11; $i++) {
    echo '<option value="' . $i . '">' . $i . '</option>';
}
echo '</select>
    <input type="submit" name="rate_submit" value="Rate">
</fieldset></form>';
