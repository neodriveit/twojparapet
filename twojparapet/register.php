<?php
    session_start();

    require_once ( 'connection.php' );
    $login = $_POST ['login'];
    $password = $_POST ['password'];
    $city = $_POST ['city'];
    $email = $_POST ['email'];

    $polaczenie = @new mysqli( $host, $db_user, $db_password, $db_name );

    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: $polaczenie->connect_errno Opis: $polaczenie->connect_error";  //W przypadku witryny publicznej raczej nie ujawniamy connect_error - ujawnia za du¿o informacji - connect_errno w zupe³noœci wystarczy
    }

    $sql = "INSERT INTO `users` (`id`, `login`, `password`, `city`, `email`) VALUES (NULL, '$login', '$password', '$city', '$email')";
    if ( $polaczenie->query($sql) ) {
        $_SESSION['dodano'] = true;
         header ( 'Location: index.php' );
         echo$_SESSION['error'] = "Dodano nowego u¿ytkownika";
        exit();
    } else {
        echo "Blad!";
    }
?>