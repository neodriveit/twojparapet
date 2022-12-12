<?php   
    if(isset($_SESSION['log'])) {
    echo "
    <div align=\"center\"><b>"
        .$_SESSION['login']."
        </b><a href=\"log_out.php\">wyloguj</a><br/>
        <br/><a href=\"dodaj.php\">dodaj nowa rosline</a><br/>
        <a href=\"users.php\">inni uzytkownicy</a><br/>
        <a href=\"plants.php\">moje rosliny</a><br/>
        <a href=\"wiadomosci.php\">wiadomosci</a><br /><br /><br />
     </div>";
     }
?>