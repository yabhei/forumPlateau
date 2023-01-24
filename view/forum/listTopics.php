



<?php

$topics = $result["data"]['topics'];
    
?>

<h1>liste topics</h1>

<table>
    <thead>
        <th>ID Topic</th>
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
        <td><?= $topic->getlocked()?></td>
    </tr>
    <?php
}?>
    </tbody>

</table>
