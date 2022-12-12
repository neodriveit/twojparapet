<?php

    session_start();   //Rozpoczynamy sesjê aby móc korzystaæ z $_SESSION 
    
    $name = $_POST ['name'];
    $description = $_POST ['description'];
    $status = $_POST ['status'];
    $photo = $_POST ['photo'];
    $user_id = $_SESSION['user_id'];

    if(!isset($_POST['name'])) {
        header ( 'Location: index.php' );
        exit();
    } else {
        $_SESSION['error'] = "Dodawana roœlina musi posiadaæ nazwê!";
        header ( 'Location: index.php' );
    }

    require_once "connection.php";                                                              //Do tego pliku do³¹czamy zawartoœæ z pliku connect.php, który ³¹czy nas z baz¹ danych
                                                                                                //Lepiej require_once ni¿ require, bo _once chroni nas przed powieleniem kodu
                                                                                                //Lepiej require ni¿ include - w przypadku b³êdu przy require skrypt zostanie zatrzymany 
                                                                                        
    $polaczenie = @new mysqli ( $host, $db_user, $db_password, $db_name );                      //Znak @ wycisza wyœwietlanie b³êdów przez PHP - piszemy w³asn¹ funkcjê do tego
                                                                                                //EDIT
                                                                                                //Nie mog³em siê po³¹czyæ z baz¹ danych z powodu literówki w nazwie zmiennej "db_user"
                                                                                                //Nie mog³em znaleŸæ tego b³êdu, dopiero usuniêcie "@" i wyœwietlenie b³êdu wyrzuconego przez PHP
                                                                                                //Pozwoli³o mi na jego znalezienie, wiêc nie warto zawsze dawaæ "@"
    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;     //W przypadku b³êdu z po³¹czeniem z baz¹ danych wyœwietlamy kod b³êdu i opis (chocia¿ opisu lepiej unikaæ, gdy witryna bêdzie wyœwietlana publicznie)
    }

      $sql = "INSERT INTO `plants` (`id`, `name`, `description`, `status`, `photo`, `user_id`) VALUES (NULL, '$name', '$description', '$status', '$photo', '$user_id')";
    if ( $polaczenie->query($sql) ) {
        $_SESSION['error'] = "Dodano now¹ roœline";
         header ( 'Location: index.php' );
        exit();
    } else {
        $_SESSION['error'] = "Wyst¹pi³ b³¹d";
    }
            $polaczenie->close();                                                                           
?>