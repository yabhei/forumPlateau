<link rel="stylesheet" href="style.css">
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

    if (isset($topics)) {
        ?>
<table >
    <thead>
        
        <th>User</th>
        <th>Title</th>
        <th>Date </th>
        <?php
        if (isset($category)) {
            ?>
        <th>Status</th>
        <th>Action</th>
        
        <?php
        }
        ?>
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
        foreach ($topics as $topic) {

            ?>
    <tr>
    <td><a href="index.php?ctrl=forum&action=userInfos&id=<?= $topic->getUser()->getId() ?>"><span class="fas fa-user"></span>&nbsp;<?= $topic->getUser()->getpseudo() ?></a></td>
       
        <td><p><a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>"><?= $topic->getTitle() ?></a></p></td>
        <td><?= $topic->getdateTopic() ?></td>
        <?php
        if (isset($category)) {
            ?>
        <td><?php
                if ($sessionObj->isAdmin() || $topic->getUser()->getId() == $sessionObj->getUser()->getId()) {
                    if ($topic->getlocked()) {
                        ?>
            <a href="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId() ?>"><i class="material-icons">lock_open</i></a>
            <?php
                        // echo "Open";
                    } else {
                        ?>
           <a href="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId() ?>"> <i class="material-icons">lock</i></a>
            <?php
                        // echo "Closed";
                    }
                } else {
                    if ($topic->getlocked()) {
                        ?>
                <i class="material-icons">lock_open</i>
            <?php
                    } else {
                        ?>
                <i class="material-icons">lock</i>
            <?php
                    }

                }
                ?>
     </td>
     <td>
        <?php
                if ($sessionObj->isAdmin()) {
                    ?>
           <a href=""> <i class="material-icons">favorite</i></a>
            <?php

                }else if ( $topic->getUser()->getId() == $sessionObj->getUser()->getId()) {
             ?>
        <a href="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>"><i class="material-icons">delete</i></a>
        <?php
         }else{
            ?>
            <i class="material-icons">favorite</i>
            <?php

         }
         ?>
        </td>
       
   
         <?php
        }
        ?>
         <td>
        <?php
            if ($sessionObj->isAdmin()) {
        ?>
          <a href="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>"><i class="material-icons">delete</i></a>
        <?php
            }
        ?>
         </td>
    </tr>
    <?php
        } ?>
    </tbody>

</table>

<?php
    }else {
        ?>
    <h3><< CETTE CATEGORIE EST VIDE ! <i class="material-icons">sentiment_dissatisfied</i>  >>  </h3>
    
    
    
    <?php    
        
    } 
        if(isset($category)){
            if($sessionObj->getUser()->getStatus()){
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
        }else{
            ?>
                <h3> << Vous êtes bloqué, vous ne pouvez pas ajouter de Topic ! >></h3>
        <?php 
        }    
    }
    ?>
   

       