<?php

$categories = $result["data"]['categories'];
    
?>

<h1>liste categories</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
        
        </tr>
    </thead>
    <tbody>
<?php
foreach($categories as $category ){

    ?>
    <tr>
        <td><?=$category->getId()?></td>
        <td><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?=$category->getId()?>"><?=$category->getnameCategory()?></a></td>
    
    </tr>
    <?php
}
?>
    </tbody>
</table>
  
