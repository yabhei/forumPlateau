<?php

$users = $result["data"]['users'];
    
?>

<h1>liste Users</h1>

<?php
foreach($users as $user ){

    ?>
    <p><?=$user->getpseudo()?></p>
    <?php
}
