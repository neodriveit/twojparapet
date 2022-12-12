<?php
    include('header.php');
    include('error.php');
?>
    <div align="center">
        <br />
        <form action="send.php" method="post" align="center">
            <br /><br />>>>WYSLIJ WIADOMOSC DO: <?php echo $_GET['user']; ?><<<<br />_____________________<br />
            <br />Wiadomosc:<br />
            <input type="textbox" name="message" />
            <input type="hidden" name="id_receiver" value="<?php echo $_GET['id_receiver']; ?>" />
            <br />
            <br />
            <button type="submit">Wyslij wiadomosc</button>
            <br />
        </form>
        <br />
        <a href="users.php">Anuluj</a>
    </div>
<?php include('footer.php'); ?>