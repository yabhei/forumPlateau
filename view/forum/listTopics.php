



<?php

$topics = $result["data"]['topics'];
    
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
    // echo $topic->getlocked();
    // die();

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
