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
        <?php
            if ($sessionObj->isAdmin()) {
                ?>

        <td><a href="index.php?ctrl=forum&action=deleteCategory&id=<?=$category->getId()?>"><i class="material-icons">delete</i></a></td>
        <?php
            }
            ?>
    
    </tr>
    <?php
}
?>
    </tbody>
</table>

<?php
if ($sessionObj->getUser()->getStatus()) {
    ?>
        <form action="index.php?ctrl=forum&action=addCategory " method="POST">
        <p>
             <h3>Ajouter un Category :</h3>
        </p>
        <p>
            <label id="ajoutecategory">Nom :</label>
            <input type="text" name="nom" >
        </p>
        
        <input type="submit" value="Ajouter">
      
    </form>
    <?php
}else{
    ?>
        <h3> << Vous êtes bloqué, vous ne pouvez pas ajouter de Category ! >></h3>
<?php 
}    
    ?>
  
   
  
