<?php

    session_start();   //Rozpoczynamy sesję aby móc korzystać z $_SESSION 
    if ( (!isset($_POST['login'])) || (!isset($_POST['password']))) {
        header ( 'Location: index.php' );
        exit();
    }

    require_once "connection.php";                                                              //Do tego pliku dołączamy zawartość z pliku connect.php, który łączy nas z bazą danych
                                                                                                //Lepiej require_once niż require, bo _once chroni nas przed powieleniem kodu
                                                                                                //Lepiej require niż include - w przypadku błędu przy require skrypt zostanie zatrzymany 
                                                                                                
    $polaczenie = @new mysqli ( $host, $db_user, $db_password, $db_name );                      //Znak @ wycisza wyświetlanie błędów przez PHP - piszemy własną funkcję do tego
                                                                                                //EDIT
                                                                                                //Nie mogłem się połączyć z bazą danych z powodu literówki w nazwie zmiennej "db_user"
                                                                                                //Nie mogłem znaleźć tego błędu, dopiero usunięcie "@" i wyświetlenie błędu wyrzuconego przez PHP
                                                                                                //Pozwoliło mi na jego znalezienie, więc nie warto zawsze dawać "@"
    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;     //W przypadku błędu z połączeniem z bazą danych wyświetlamy kod błędu i opis (chociaż opisu lepiej unikać, gdy witryna będzie wyświetlana publicznie)
    } else {
        $login = $_POST["login"];                                                               //Do zmiennej login przypisujemy wartość wprowadzoną z formularza admin.php
        $password = md5($_POST["password"]);                                                               //Analogicznie postępujemy z hasłem
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $haslo = htmlentities($password, ENT_QUOTES, "UTF-8");
        
  //Tworzymy treść zapytania do bazy danych !!!Trzeba zrobić ochronę przed wstrzykiwaniem SQL-a
                                                                                                //Zwróćmy uwagę na to, że tutaj odwrotnie używa się cudzysłowie i apostrofy
        
        
        if  ( $rezultat = @$polaczenie->query( sprintf("SELECT * FROM users WHERE login = '%s' AND password = '%s'",
        mysqli_real_escape_string($polaczenie, $login ), 
        mysqli_real_escape_string($polaczenie, $password ))) ) {  //Wysyłamy zapytanie do bazy danych      
                                                        //Jeżeli błąd w zapytaniu to metoda zwraca false (dlaczego, gdy jest 0 rekordów, to test przechodzi pomimo, że wynik to 0?)
            
            if ( $rezultat->num_rows == 1 ) {
                $_SESSION['log'] = true;
                $wiersz = $rezultat->fetch_assoc(); //Z wyniku zapytania tworzymy tablicę asocjacyjną
                $_SESSION['login'] = $wiersz['login'];  //Tworzymy zmienną globalną $_SESSION, która umożliwi przesyłanie danych do innych stron PHP
                $_SESSION['user_id'] = $wiersz['id'];
                $_SESSION['login1']=$_SESSION['login'];
                $_SESSION['user_id1']=$_SESSION['user_id'];
                $rezultat->free_result(); //Po odczycie TRZEBA KONIECZNIE zwolnić zwrócone z bazy rezultaty zapytania, żeby zwolnić pamięć RAM serwera
                header ( 'Location: plants.php' );
                unset ( $_SESSION['error'] ); 
            } else {
                $_SESSION['error'] = "Błędne dane do logowania";
                header ( 'Location: index.php');

            }
            
        } else {
            echo " jakis blad ";
        }
            $polaczenie->close();                                                                           

    }
?>