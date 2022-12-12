<?php
    include('header.php');
    include('error.php');
?>
    <div align="center">
        <br />
        <form action="add.php" method="post" align="center">
            <br /><br />>>>DODAJ ROSLINE<<<<br />_____________________<br />
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
            <br />
            <br />
            <button type="submit">Dodaj roslinê</button>
            <br />
        </form>
        <br />
        <a href="plants.php">Wstecz</a>
    </div>
<?php include('footer.php'); ?>