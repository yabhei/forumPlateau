<?php

$posts = $result["data"]['posts'];

    
?>

<h1>liste Posts</h1>

<?php
foreach($posts as $post ){

    ?>
    <p><?=$post->gettext()?></p>
    <?php
}
