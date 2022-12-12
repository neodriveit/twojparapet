<?php                                                                                  //Lepiej require ni¿ include - w przypadku b³êdu przy require skrypt zostanie zatrzymany                           
    include('header.php');                                                                                  //Lepiej require ni¿ include - w przypadku b³êdu przy require skrypt zostanie zatrzymany                           
    include('menu.php');
    $polaczenie = @new mysqli ( $host, $db_user, $db_password, $db_name );                      //Znak @ wycisza wyœwietlanie b³êdów przez PHP - piszemy w³asn¹ funkcjê do tego
                                                                                                 //Pozwoli³o mi na jego znalezienie, wiêc nie warto zawsze dawaæ "@"
    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
    }



$sql="SELECT `id`, `status` FROM `status`";
$result = $polaczenie->query($sql);
 while($row = $result->fetch_array()){
 $status[$row['id']] = $row['status'];
 }
          
$user_id = $_SESSION['user_id'];
if(isset($_GET['user_id'])) $user_id = $_GET['user_id'];

$sql="SELECT `id`, `name`, `description`, `status` FROM `plants` WHERE `user_id` = '".$user_id."'";
$result = $polaczenie->query($sql);
$ile = 0;
 while($row = $result->fetch_array()){$ile++;
 if($ile==1){
 echo "
    <div align=\"center\"><br/>";
    if(isset($_GET['user'])) echo "<b>Rosliny uzytkownika: ".$_GET['user']."</b>"; 
 echo       "<table id=\"tab\" align=\"center\">
            <tr id=\"title\">
                <td><b>Nazwa</b></td>
                <td><b>Info</b></td>
                <td><b>Status</b></td>
            </tr>";
}
echo "<tr><td align>".$row['name']."</td><td>".$row['description']."</td><td>".$status[$row['status']]."</td>";
//if(!isset($_GET['user'])) echo "<td><a href=\"edytuj.php\">edytuj</a></td>"; 
echo "</tr>";
}if($ile==0) echo "<div align=\"center\">brak roslin do wyswietlenia";
echo "     <table>
 
    </div>
    ";
            $polaczenie->close();  
include('footer.php')
?>