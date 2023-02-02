<?php

$user = $result["data"]['userInfo'];
    
?>

<h1>User Information : </h1>

    <p>
      <label >Email : </label> <?=$user->getemail()?>
    </p>
    <p>
      <label >Username : </label> <?=$user->getpseudo()?>
    </p>
    <p>
      <label >Registration Date : </label> <?=$user->getregistrationDate()?>
    </p>
    <p>
      <label >Role : </label> <?=$user->getRole()?>
    </p>

