<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    require '../errors/404.php';
    exit();
};

echo '<form name="discussion" action="" method="post" onsubmit="return validateDiscussion()">
    <fieldset>
        <input type="text" name="post_message">
        <input type="submit" name="discussion_submit" value="Submit" />
    </fieldset>
</form>';
