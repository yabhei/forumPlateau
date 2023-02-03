<?php
use App\Session;

$sessionObj = new Session();

$users = $result["data"]['users'];
    
?>

<h1>liste Users :</h1>


<table >
<thead>

<th>Username </th>
<th>Email </th>
<th>Registration Date </th>
<th>Status </th>
<th>Edit </th>

</thead>
<tbody>
<?php
foreach($users as $user ){

?>
<tr>
<?php

if($user->getRole() == 'ROLE_ADMIN'){?>
    <td><a href="index.php?ctrl=forum&action=userInfos&id=<?=$user->getId()?>"><span class="fas fa-user"></span>&nbsp;<?= $user->getpseudo()?></a><i class="material-icons">star</i>  </td>
<?php 
}else{
?>
<td>
<a href="index.php?ctrl=forum&action=userInfos&id=<?=$user->getId()?>"><span class="fas fa-user"></span>&nbsp;<?= $user->getpseudo()?></a>
</td>
<!-- <td><?//=$user->getpseudo()?></td> -->
<?php
}
?>
<td><?=$user->getemail()?></td>
<td><?=$user->getregistrationDate()?></td>
<td><a href="index.php?ctrl=forum&action=changeStatus&id=<?=$user->getId()?>">
    <?php
    if ($user->getStatus()) {?>
       <i class="material-icons">check_circle</i>
    <?php
} else{ 
    ?>
    <i>
    <i class="material-icons">block</i>
    </i>
    <?php
} ?></a> </td>
<td><a href="index.php?ctrl=forum&action=deleteUser&id=<?=$user->getId()?>"><i class="material-icons">delete</i></a></td>
</tr>
<?php
}?>
</tbody>
<!-- <span class="material-symbols-outlined">
check_circle
</span> -->
</table>
