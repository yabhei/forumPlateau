
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Se connecter :</h1>
    <form action="index.php?ctrl=security&action=loginUser" method="post">
        <p>
            <label id="insclabel">E-mail :</label>
            <input type="text" name="loginUsername" >
        </p>
        <p>
            <label id="insclabel">Password :</label>
            <input type="password" name="loginPassword" >
        </p>
   

        <input type="submit" name="submit" value="Sign In">
      
    </form>
</body>
</html>
