<?php
use App\Session;

$sessionObj = new Session();

$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];

    
?>

<h1>liste Posts</h1>
<?php 
        if($topic != null){
    ?>
    <h3><?= $topic->getTitle(); ?> :</h3>
<?php
        }
    ?>
<?php
if(isset($posts)){
?>
<table >
    <thead>
        <tr>
           
            <th>Text</th>
            <th>Date </th>
            <th>Edit </th>
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
  foreach($posts as $post ){

    ?>
    <tr>
        
        <td><?= $post->gettext(); ?></td>
        <td><?=$post->getdatePost()?></td>
        <?php
        if(App\Session::getUser()) {
            if ($post->getUser()->getId() == App\Session::getUser()->getId()) {
                ?>
        <td><a href="index.php?ctrl=forum&action=deletePost&id=<?= $post->getId() ?>"><i class="material-icons">delete</i></a></td>
        <?php
            }else {
                ?>
                <td><a href=""  ><i class="material-icons" >favorite</i></a></td>
                <?php
            }
        }
        ?>
        <?php
            if ($sessionObj->isAdmin()) {
        ?>
        <td><a href="index.php?ctrl=forum&action=deletePost&id=<?=$post->getId()?>" ><i class="material-icons">delete</i></a></td>
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
}else {
    ?>
<h3><< CETTE TOPIC EST VIDE ! <i class="material-icons">sentiment_dissatisfied</i> >>  </h3>



<?php    
    
} 
    if($topic != null && $topic->getlocked() ){
            if ($sessionObj->getUser()->getStatus()) {
        ?>
        <form action="index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method="POST">
        <p>
             <h3>Ajouter un Post :</h3>
        </p>
        <p>
            <label id="ajoutepost"> Post :</label>

            <textarea name="post" id="post" cols="30" rows="5"></textarea>
        </p>
        <input type="submit" value="Ajouter">
      
    </form>
  
    <?php
    }else{
        ?>
            <h3> << Vous êtes bloqué, vous ne pouvez pas ajouter de Post ! >></h3>
    <?php 
    }    
    }else{
        ?>
            <h3> << Le topic est verrouillé, Vous ne pouvez pas ajouter de Post ! >></h3>
    <?php 
    }    
    ?>

