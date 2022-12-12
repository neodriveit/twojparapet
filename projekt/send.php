<?php

    session_start();
    require_once "connection.php";  
    $polaczenie = @new mysqli ( $host, $db_user, $db_password, $db_name ); 
    
    if(empty($_POST['message'])) {
    $_SESSION['error'] = 'Wiadomosc nie moze byc pusta!';
    header('Location: wiadomosc.php');
    exit();
}else{                                                                      //EDIT                                                      //Nie mog³em siê po³¹czyæ z baz¹ danych z powodu literówki w nazwie zmiennej "db_user"
                                                                                                //Nie mog³em znaleŸæ tego b³êdu, dopiero usuniêcie "@" i wyœwietlenie b³êdu wyrzuconego przez PHP                                                                         //Pozwoli³o mi na jego znalezienie, wiêc nie warto zawsze dawaæ "@"
    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;     //W przypadku b³êdu z po³¹czeniem z baz¹ danych wyœwietlamy kod b³êdu i opis (chocia¿ opisu lepiej unikaæ, gdy witryna bêdzie wyœwietlana publicznie)
    }
    $id_sender=$_SESSION['user_id'];
    $id_receiver=$_POST['id_receiver'];
    $message=$_POST['message'];

    $sql = "INSERT INTO `messages` (`id`, `id_sender`, `id_receiver`, `message`) VALUES (NULL, '$id_sender', '$id_receiver', '$message')";
    if ( $polaczenie->query($sql) ) {
        $_SESSION['error'] = "Wiadomosc zostala wyslana";
         header ( 'Location: users.php' );
         exit();
    } else {
        $_SESSION['error'] = "Wystapil blad";
    }
            $polaczenie->close();
}
?>