<?php

use App\Session;

$sessionObj = new Session();

$topics = $result["data"]['topics'];
if(isset($result["data"]['category'])){

$category = $result["data"]['category'];
}
?>

<h1>liste topics</h1>

    <?php 
        if(isset($category)){
    ?>
        <h3><?= $category->getnameCategory() ; ?> :</h3>
    <?php
        }
    ?>
<table >
    <thead>
        
        <th>Title</th>
        <th>Date </th>
        <th>Status</th>
        <th>User</th>
        <?php
            if ($sessionObj->isAdmin()) {
        ?>
            <th>Supprimer</th>
        <?php
            }
        ?>
        
    </thead>
    <tbody>
<?php
foreach($topics as $topic ){

    ?>
    <tr>
       
        <td><p><a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?=$topic->getId()?>"><?=$topic->getTitle()?></a></p></td>
        <td><?=$topic->getdateTopic()?></td>
        <td><?php
    if($sessionObj->isAdmin() || $topic->getUser()->getId() == $sessionObj->getUser()->getId()){
        if ($topic->getlocked()) {
            ?>
            <a href="index.php?ctrl=forum&action=lockTopic&id=<?=$topic->getId()?>"><i class="material-icons">lock_open</i></a>
            <?php
            // echo "Open";
        } else{
            ?>
           <a href="index.php?ctrl=forum&action=lockTopic&id=<?=$topic->getId()?>"> <i class="material-icons">lock</i></a>
            <?php
            // echo "Closed";
        }
    }
     ?>
     </td>
     <td><a href="index.php?ctrl=forum&action=userInfos&id=<?= $topic->getUser()->getId()?>"><span class="fas fa-user"></span>&nbsp;<?= $topic->getUser()->getpseudo()?></a></td>
         <?php
            if ($sessionObj->isAdmin()) {
        ?>
        <td><a href="index.php?ctrl=forum&action=deleteTopic&id=<?=$topic->getId()?>"><i class="material-icons">delete</i></a></td>
        <?php
            }
        ?>
    </tr>
    <?php
}?>
    </tbody>

</table>

<?php 
        if(isset($category)){
    ?>
        <form action="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>" method="POST">
        <p>
             <h3>Ajouter un Topic :</h3>
        </p>
        <p>
            <label id="ajoutetopic">Title :</label>
            <input type="text" name="title" >
        </p>
        <p>
            <label id="ajoutetopic">Première Post :</label>

            <textarea name="post" id="post" cols="30" rows="5"></textarea>
        </p>
        <input type="submit" value="Ajouter">
      
    </form>
  
    <?php
        }
    ?>
   

       