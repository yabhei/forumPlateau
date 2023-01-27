<?php

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

<table >
    <thead>
        <tr>
           
            <th>Text</th>
            <th>Date </th>
            
        </tr>
    </thead>
    <tbody>
<?php
foreach($posts as $post ){

    ?>
    <tr>
        
        <td><?=$post->gettext()?></td>
        <td><?=$post->getdatePost()?></td>
        
    </tr>
    <?php
}?>
    </tbody>

</table>

<?php 
        if($topic != null && $topic->getlocked() == 1){
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
        }
    ?>

