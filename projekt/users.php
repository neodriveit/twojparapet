<?php                                                                                  //Lepiej require ni¿ include - w przypadku b³êdu przy require skrypt zostanie zatrzymany                           
    include('header.php');                                                                                  //Lepiej require ni¿ include - w przypadku b³êdu przy require skrypt zostanie zatrzymany                           
    include('menu.php');                                                                                    //Lepiej require ni¿ include - w przypadku b³êdu przy require skrypt zostanie zatrzymany                           
    include('error.php');                                                                                  //Lepiej require ni¿ include - w przypadku b³êdu przy require skrypt zostanie zatrzymany                           
    $polaczenie = @new mysqli ( $host, $db_user, $db_password, $db_name );                      //Znak @ wycisza wyœwietlanie b³êdów przez PHP - piszemy w³asn¹ funkcjê do tego
                                                                                                 //Pozwoli³o mi na jego znalezienie, wiêc nie warto zawsze dawaæ "@"
    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
    }


echo "
    <br/><div align=\"center\">
        <table>
            <tr id=\"title\">
                <td><b><span id=\"title\">Uzytkownik   </span></b></td>
                <td><b>Miasto   </b></td>
                <td><b>Ile roslin</b></td>
            </tr>";
$ile = 0;   
$sql="SELECT `id`, `login`, `city` FROM `users`";
$result = $polaczenie->query($sql);

 while($row = $result->fetch_array()){

 $sql="SELECT * FROM `plants` WHERE `user_id` = '".$row['id']."'";
$results = $polaczenie->query($sql);
 while($plants = $results->fetch_array()) $ile++;
 if($row['id']==$_SESSION['user_id']) continue;
echo "<tr><td>".$row['login']."</td><td>".$row['city']."</td><td align=\"center\">".$ile."</td>
<td><a href=\"plants.php?user_id=".$row['id']."&user=".$row['login']."\">pokaz</a></td>
<td><a href=\"wiadomosc.php?id_receiver=".$row['id']."&user=".$row['login']."\">kontakt</a></td></tr>";
$ile = 0;
}
echo "     <table>
 
    <div>
    ";
            $polaczenie->close();
include('footer.php');
?>