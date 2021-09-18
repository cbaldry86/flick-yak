<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    require '../errors/404.php';
    exit();
};

echo '<form name="discussion" action="" method="post" onsubmit="return validateDiscussion()">
    <fieldset>
        <textarea type="textarea" name="post_message"></textarea>
        <input type="submit" name="discussion_submit" value="Submit" />
    </fieldset>
</form>';
