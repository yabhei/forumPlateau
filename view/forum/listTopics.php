<?php



$topics = $result["data"]['topics'];
$users = $result["data"]['users'];
$categories = $result["data"]['categories'];
    
?>

<h1>liste topics</h1>

<table >
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Date </th>
        <th>Status</th>
        
    </thead>
    <tbody>
<?php
foreach($topics as $topic ){

    ?>
    <tr>
        <td><?=$topic->getId()?></td>
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


<h3>Ajouter un Topic :</h3>
    <form action="index.php?ctrl=forum&action=addtopic&id=<?= $topic->getcategory()->getId() ?>" method="post">
        <p>
            <label id="ajoutetopic">Title :</label>
            <input type="text" name="title" >
        </p>
        <p>
            <label id="ajoutetopic">Date :</label>
            <input type="date" name="date" >
        </p>
        <p>
            <label id="ajoutetopic">Status :</label>
            <input type="radio" name="status" value="1"> OPEN
            <input type="radio" name="status" value="0"> CLOSED
        </p>
        <p>
            <label id="ajoutetopic">User :</label>

            <select name="user" id="user">
                <?php
                foreach($users as $user){ 
                    ?>
                    <option value="<?=$user->getId(); ?>"><?=$user->getpseudo(); ?></option>
                <?php
                }
                 ?>
                
            </select>
            
            
           
        </p>
        
        <p>
        <label id="ajoutetopic">Category :</label>
        <select name="category" id="category">
                <?php
                foreach($categories as $category){ 
                    ?>
                    <option value="<?=$category->getId(); ?>"><?=$category->getnameCategory(); ?></option>
                <?php
                }
                 ?>
                
            </select>
        </p>

        <input type="submit" value="Ajouter">
      
    </form>

</form>
