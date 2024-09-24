<?php
    require "database.php";
    if (isset($_POST['knop'])) {
        $db->inlog($_POST['email'], $_POST['wachtwoord']);
    }
    if (isset($_POST['uitloggen'])) {
        $db->uitloggen();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
</head>
<body>
    <br> <br>
    <form method="POST">
        <input type="submit" name="uitloggen" value="uitloggen">
    </form>
    <form method="POST"> 
        <br><label for="email">Email:</label>
        <input type="email" name="email" required> <br>
        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" name="wachtwoord" required> <br>
        <input type="submit" name="knop">
    </form>
</body>
</html>