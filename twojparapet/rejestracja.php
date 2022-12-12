<?php
    session_start();
    require_once ( 'connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Twój parapet</title>
</head>
<body>
    <div align="center">
        <br />
        <form action="register.php" method="post" align="center">
            <br /><br />>>>ZAREJESTRUJ<<<<br />_____________________<br />
            <br />Login:<br />
            <input type="text" name="login" />
            <br />Hasło:<br />
            <input type="password" name="password" />
            <br />Miasto:<br />
            <input type="text" name="city" />
            <br />E-mail:<br />
            <input type="text" name="email" />
            <br />
            <br />
            <button type="submit">Stwórz konto</button>
            <br />
            <br />
        </form>
    </div>
</body>
</html>