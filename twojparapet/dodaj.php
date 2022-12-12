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
        <form action="add.php" method="post" align="center">
            <br /><br />>>>DODAJ ROŒLINÊ<<<<br />_____________________<br />
            <br />Nazwa:<br />
            <input type="text" name="name" />
            <br />Opis:<br />
            <input type="textbox" name="description" />
            <br />Status:<br />
            <select name="status">
                <option value="1">W posiadaniu</option>
                <option value="2">Na sprzeda¿</option>
                <option value="3">Na wymiane</option>
                <option value="4">Archiwalne</option>
            </select>
            <br />Foto:<br />
            <input type="file" name="photo" />
            <br />
            <br />
            <button type="submit">Dodaj roœlinê</button>
            <br />
            <br />
        </form>
    </div>
</body>
</html>