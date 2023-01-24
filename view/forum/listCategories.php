<?php

$categories = $result["data"]['categories'];
    
?>

<h1>liste categories</h1>

<?php
foreach($categories as $category ){

    ?>
    <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?=$category->getId()?>"><?=$category->getnameCategory()?></a></p>
    
    <?php
}


  
