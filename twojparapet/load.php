<?php

    require_once ('connection.php');                                                                                     //Lepiej require niż include - w przypadku błędu przy require skrypt zostanie zatrzymany                           
    $polaczenie = @new mysqli ( $host, $db_user, $db_password, $db_name );                      //Znak @ wycisza wyświetlanie błędów przez PHP - piszemy własną funkcję do tego
                                                                                                 //Pozwoliło mi na jego znalezienie, więc nie warto zawsze dawać "@"
    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
    }
    
    $user = $_SESSION['login1'];
    $user_id = $_SESSION['user_id1'];



$sql="SELECT `id`, `status` FROM `status`";
$result = $polaczenie->query($sql);
 while($row = $result->fetch_array()){
 $status[$row['id']] = $row['status'];
 }
          
$sql="SELECT `id`, `name`, `description`, `status` FROM `plants` WHERE `user_id` = '".$user_id."'";
$result = $polaczenie->query($sql);
$ile = 0;
 while($row = $result->fetch_array()){$ile++;
 if($ile==1){
 echo "
    <div align=\"center\">
    <b>Rośliny użytkownika ".$user."</b><br/><br/>
        <table>
            <tr>
                <td><b>Nazwa</b></td>
                <td><b>Status</b></td>
                <td><b>Opis</b></td>
            </tr>";
}
echo "<tr><td>".$row['name']."</td><td>".$status[$row['status']]."</td><td>".$row['description']."</td><td><a href=\"edytuj.php\">edytuj</a></td></tr>";
}if($ile==0) echo "<div align=\"center\">brak roślin do wyświetlenia";
echo "     <table>
 
    </div>
    ";
            $polaczenie->close();                                                                              
?>