<?php                                                                                  //Lepiej require niż include - w przypadku błędu przy require skrypt zostanie zatrzymany                           
    include('header.php');                                                                                  //Lepiej require niż include - w przypadku błędu przy require skrypt zostanie zatrzymany                           
    include('menu.php');
    $polaczenie = @new mysqli ( $host, $db_user, $db_password, $db_name );                      //Znak @ wycisza wyświetlanie błędów przez PHP - piszemy własną funkcję do tego
                                                                                                 //Pozwoliło mi na jego znalezienie, więc nie warto zawsze dawać "@"
    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
    }

    


$sql="SELECT `id`, `id_sender`, `message` FROM `messages` WHERE `id_receiver` = '".$_SESSION['user_id']."'";
$result = $polaczenie->query($sql);
$ile = 0;

 $sender=NULL;
 while($row = $result->fetch_array()){$ile++;

  $sql1="SELECT `login` FROM `users` WHERE `id` = '".$row['id_sender']."'";
$result1 = $polaczenie->query($sql1);
 while($row1 = $result1->fetch_array()){
 if($row1['login'])$sender = $row1['login'];
 }

 if($ile==1){
 echo "
    <div align=\"center\"><br/>
        <table align=\"center\">
            <tr>
                <td><b>Nadawca</b></td>
                <td><b>Wiadomosc</b></td>
            </tr>";
}
echo "<tr><td>".$sender."</td><td>".$row['message']."</td></tr>";
}if($ile==0) echo "<div align=\"center\">brak wiadomosci do wyswietlenia";
echo "     <table>
 
    </div>
    ";
            $polaczenie->close();  
include('footer.php')
?>