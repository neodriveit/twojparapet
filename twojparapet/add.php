<?php

    session_start();   //Rozpoczynamy sesj� aby m�c korzysta� z $_SESSION 
    
    $name = $_POST ['name'];
    $description = $_POST ['description'];
    $status = $_POST ['status'];
    $photo = $_POST ['photo'];
    $user_id = $_SESSION['user_id'];

    if(!isset($_POST['name'])) {
        header ( 'Location: index.php' );
        exit();
    } else {
        $_SESSION['error'] = "Dodawana ro�lina musi posiada� nazw�!";
        header ( 'Location: index.php' );
    }

    require_once "connection.php";                                                              //Do tego pliku do��czamy zawarto�� z pliku connect.php, kt�ry ��czy nas z baz� danych
                                                                                                //Lepiej require_once ni� require, bo _once chroni nas przed powieleniem kodu
                                                                                                //Lepiej require ni� include - w przypadku b��du przy require skrypt zostanie zatrzymany 
                                                                                        
    $polaczenie = @new mysqli ( $host, $db_user, $db_password, $db_name );                      //Znak @ wycisza wy�wietlanie b��d�w przez PHP - piszemy w�asn� funkcj� do tego
                                                                                                //EDIT
                                                                                                //Nie mog�em si� po��czy� z baz� danych z powodu liter�wki w nazwie zmiennej "db_user"
                                                                                                //Nie mog�em znale�� tego b��du, dopiero usuni�cie "@" i wy�wietlenie b��du wyrzuconego przez PHP
                                                                                                //Pozwoli�o mi na jego znalezienie, wi�c nie warto zawsze dawa� "@"
    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;     //W przypadku b��du z po��czeniem z baz� danych wy�wietlamy kod b��du i opis (chocia� opisu lepiej unika�, gdy witryna b�dzie wy�wietlana publicznie)
    }

      $sql = "INSERT INTO `plants` (`id`, `name`, `description`, `status`, `photo`, `user_id`) VALUES (NULL, '$name', '$description', '$status', '$photo', '$user_id')";
    if ( $polaczenie->query($sql) ) {
        $_SESSION['error'] = "Dodano now� ro�line";
         header ( 'Location: index.php' );
        exit();
    } else {
        $_SESSION['error'] = "Wyst�pi� b��d";
    }
            $polaczenie->close();                                                                           
?>