<?php

$categoies = $result["data"]['categoies'];
    
?>

<h1>liste categoies</h1>

<?php
foreach($categoies as $category ){

    ?>
    <p><?=$category->getname_category()?></p>
    <?php
}


  