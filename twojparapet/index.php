<?php
    session_start();
    require_once ( 'connection.php');
    if(!isset($_SESSION['error'])) $_SESSION['error'] = NULL;
    include('header.php');
    ?>

<body>

<?php 
    if(isset($_SESSION['log'])) {
    echo "
    <div align=\"right\">"
        .$_SESSION['login']."
        <a href=\"log_out.php\">wyloguj</a><br/><br/>
        <br/><a href=\"dodaj.php\">dodaj nową roślinę</a><br/>";
        if($_SESSION['page'] != 'users') echo "<a href=\"userss.php\">inni użytkownicy</a><br/>";
        if($_SESSION['page'] != 'plants') echo "<a href=\"plants.php\">moje rośliny</a><br/>";
        echo "<a href=\"wiadomosci.php\">wiadomości</a><br /><br /><br />
     </div>
    <div align=\"left\">"
    .$_SESSION['error']."
    </div>
";
}//if(isset($_SESSION['log']))

    if(isset($_SESSION['log'])&&$_SESSION['page'] == 'plants') include ('load.php');
    if(isset($_SESSION['log'])&&$_SESSION['page'] == 'users') include ('users.php');
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
    $_SESSION['error'] = NULL;
    ?>
</body>
</html>