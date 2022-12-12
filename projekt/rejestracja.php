<?php
    include('header.php');
    include('error.php');
?>
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
        <a href="index.php">Zaloguj</a>
    </div>
<?php include('footer.php'); ?>