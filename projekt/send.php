<?php

    session_start();
    require_once "connection.php";  
    $polaczenie = @new mysqli ( $host, $db_user, $db_password, $db_name ); 
    
    if(empty($_POST['message'])) {
    $_SESSION['error'] = 'Wiadomosc nie moze byc pusta!';
    header('Location: wiadomosc.php');
    exit();
}else{                                                                      //EDIT                                                      //Nie mog�em si� po��czy� z baz� danych z powodu liter�wki w nazwie zmiennej "db_user"
                                                                                                //Nie mog�em znale�� tego b��du, dopiero usuni�cie "@" i wy�wietlenie b��du wyrzuconego przez PHP                                                                         //Pozwoli�o mi na jego znalezienie, wi�c nie warto zawsze dawa� "@"
    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;     //W przypadku b��du z po��czeniem z baz� danych wy�wietlamy kod b��du i opis (chocia� opisu lepiej unika�, gdy witryna b�dzie wy�wietlana publicznie)
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