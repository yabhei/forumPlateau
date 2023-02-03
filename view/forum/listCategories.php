<?php
use App\Session;

$sessionObj = new Session();

$categories = $result["data"]['categories'];
    
?>

<h1>liste categories</h1>
<table>
    <thead>
        <tr>
            
            <th>Categories</th>
            <?php
            if ($sessionObj->isAdmin()) {
                ?>
            <th>Supprimer</th>
            <?php
            }
            ?>
        
        </tr>
    </thead>
    <tbody>
<?php
foreach($categories as $category ){

    ?>
    <tr>
        
        <td><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?=$category->getId()?>"><?=$category->getnameCategory()?></a></td>
        <td><a href="index.php?ctrl=forum&action=deleteCategory&id=<?=$category->getId()?>"><i class="material-icons">delete</i></a></td>
    
    </tr>
    <?php
}
?>
    </tbody>
</table>
  
