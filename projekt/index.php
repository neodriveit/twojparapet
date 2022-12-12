<?php
    include('header.php');
    include('menu.php');
    if(isset($_SESSION['log'])) include('error.php');
    //if(isset($_SESSION['log'])&&$_SESSION['page'] == 'plants') include ('load.php');
    //if(isset($_SESSION['log'])&&$_SESSION['page'] == 'users') include ('users.php');
    if(!isset($_SESSION['log'])) echo "
    <div align=\"center\">
        <br />
        <form action=\"log_in.php\" method=\"post\" align=\"center\">
            <br /><br />"
            .$_SESSION['error'].
            "<br /><br />>>>LOGOWANIE<<<<br />_____________________<br />
            <br />Login:<br />
            <input type=\"text\" name=\"login\" />
            <br />Hasło:<br />
            <input type=\"password\" name=\"password\" />
            <br />
            <br />
            <button type=\"submit\">Zaloguj</button>
            <br />
            <br />
        </form>
        <a href=\"rejestracja.php\">Zarejestruj się</a>
    </div>";
    include('footer.php');
    ?>