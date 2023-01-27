<?php



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
        
    </thead>
    <tbody>
<?php
foreach($topics as $topic ){

    ?>
    <tr>
       
        <td><p><a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?=$topic->getId()?>"><?=$topic->getTitle()?></a></p></td>
        <td><?=$topic->getdateTopic()?></td>
        <td><?php
        if ($topic->getlocked()) {
            echo "Open";
        } else{
            echo "Closed";
        } ?></td>
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
   

       