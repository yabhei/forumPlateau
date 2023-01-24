<?php

$posts = $result["data"]['posts'];

    
?>

<h1>liste Posts</h1>

<table >
    <thead>
        <tr>
            <th>ID</th>
            <th>Text</th>
            <th>Date </th>
            
        </tr>
    </thead>
    <tbody>
<?php
foreach($posts as $post ){

    ?>
    <tr>
        <td><?=$post->getId()?></td>
        <td><?=$post->gettext()?></td>
        <td><?=$post->getdatePost()?></td>
        
    </tr>
    <?php
}?>
    </tbody>

</table>

