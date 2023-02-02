<?php

$users = $result["data"]['users'];
    
?>

<h1>liste Users :</h1>


<table >
<thead>

<th>Username </th>
<th>Email </th>
<th>Registration Date </th>
<th>Status </th>

</thead>
<tbody>
<?php
foreach($users as $user ){

?>
<tr>

<td><?=$user->getpseudo()?></td>
<td><?=$user->getemail()?></td>
<td><?=$user->getregistrationDate()?></td>
<td><a href=""><?php
if ($user->getStatus()) {
    echo "Bloquer";
} else{
    echo "Débloquer";
} ?></a> </td>
</tr>
<?php
}?>
</tbody>

</table>
