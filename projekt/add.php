<?php

    session_start();   //Rozpoczynamy sesj� aby m�c korzysta� z $_SESSION 
    require_once "connection.php";  
    
    if(empty($_POST['name'])) {
    $_SESSION['error'] = 'Dodawana roslina musi posiadac nazwe!';
    header('Location: dodaj.php');
    exit();
}else{
    $name = $_POST ['name'];
    $description = $_POST ['description'];
    $status = $_POST ['status'];
    $user_id = $_SESSION['user_id'];                                                                                      //Lepiej require ni� include - w przypadku b��du przy require skrypt zostanie zatrzymany 
                                                                                        
    $polaczenie = @new mysqli ( $host, $db_user, $db_password, $db_name );                      //Znak @ wycisza wy�wietlanie b��d�w przez PHP - piszemy w�asn� funkcj� do tego
                                                                                                //EDIT
                                                                                                //Nie mog�em si� po��czy� z baz� danych z powodu liter�wki w nazwie zmiennej "db_user"
                                                                                                //Nie mog�em znale�� tego b��du, dopiero usuni�cie "@" i wy�wietlenie b��du wyrzuconego przez PHP                                                                         //Pozwoli�o mi na jego znalezienie, wi�c nie warto zawsze dawa� "@"
    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;     //W przypadku b��du z po��czeniem z baz� danych wy�wietlamy kod b��du i opis (chocia� opisu lepiej unika�, gdy witryna b�dzie wy�wietlana publicznie)
    }

      $sql = "INSERT INTO `plants` (`id`, `name`, `description`, `status`, `user_id`) VALUES (NULL, '$name', '$description', '$status', '$user_id')";
    if ( $polaczenie->query($sql) ) {
        $_SESSION['error'] = "Dodano nowa rosline";
         header ( 'Location: plants.php' );
        exit();
    } else {
        $_SESSION['error'] = "Wystapil blad";
    }
            $polaczenie->close();
}
?>