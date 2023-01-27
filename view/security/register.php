
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>S'inscrire :</h1>
    <form action="index.php?ctrl=security&action=registerUser" method="POST">
        <p>
            <label id="insclabel">Username :</label>
            <input type="text" name="username" >
        </p>
        <p>
            <label id="insclabel">Email :</label>
            <input type="email" name="email" >
        </p>
        <p>
            <label id="insclabel">Password :</label>
            <input type="password" name="password" >
        </p>
        <p>
            <label id="insclabel">Confirm Password :</label>
            <input type="password" name="confirmpassword" >
        </p>

        <input type="submit" name="submit" value="S'inscrire">
      
    </form>
</body>
</html>