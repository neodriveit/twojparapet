<?php
    session_start();
    require_once ( 'connection.php' );
    
    $polaczenie = @new mysqli( $host, $db_user, $db_password, $db_name );
    
    $login = $_POST ['login'];
    $password = md5($_POST ['password']);
    $city = $_POST ['city'];
    $email = $_POST ['email'];

$sql="SELECT `login`, `email` FROM `users`";
$result = $polaczenie->query($sql);
 while($row = $result->fetch_array()){
 if($login==$row['login']) {
      $_SESSION['error'] = 'Podany login jest zajety';
      header('Location: rejestracja.php');
      return;
 }
 if($email==$row['email']) {
      $_SESSION['error'] = 'Podany email zostal wczesniej uzyty';
      header('Location: rejestracja.php');
      return;
 }
}
$szablon = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$/'; //wyra¿enie regularne, na podstawie którego testowany jest e-mail
$wyniksprawdzenia = preg_match($szablon,$email); //funkcja, która odpowiada za testowanie danych na podstawie szablonu
if($wyniksprawdzenia==0){
  $_SESSION['error'] = 'Podany e-mail jest nieprawidlowy!';
  header('Location: rejestracja.php');
  }
else{
if(empty($_POST['login'])||empty($_POST['password'])||empty($_POST['city'])||empty($_POST['email'])) //sprawdzamy
{
    $_SESSION['error'] = 'Wypelnij wszystkie pola!';
    header('Location: rejestracja.php');
/*}elseif($wyniksprawdzenia==false) {
    $_SESSION['error'] = 'E-mail jest niepoprawny!';
    header('Location: rejestracja.php');
*/}else{


    if ( $polaczenie->connect_errno != 0 ) {
        echo "Kod bledu: $polaczenie->connect_errno Opis: $polaczenie->connect_error";  //W przypadku witryny publicznej raczej nie ujawniamy connect_error - ujawnia za du¿o informacji - connect_errno w zupe³noœci wystarczy
    }

    $sql = "INSERT INTO `users` (`id`, `login`, `password`, `city`, `email`) VALUES (NULL, '$login', '$password', '$city', '$email')";
    if ( $polaczenie->query($sql) ) {
        $_SESSION['dodano'] = true;
         header ( 'Location: index.php' );
         echo$_SESSION['error'] = "Dodano nowego uzytkownika";
        exit();
    } else {
        echo "Blad!";
    }
    }
}
?>