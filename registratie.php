<?php 

require "database.php";

 if (isset($_POST['knop'])) {
    $db->insertInto($_POST['email'], $_POST['wachtwoord']);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <br><label for="email">Email:</label>
        <input type="email" name="email" required> <br>
        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" name="wachtwoord" required> <br>
        <input type="submit" name="knop">
    </form>
</body>
</html>