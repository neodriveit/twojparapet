<?php 
    session_start();
    $_SESSION['page'] = 'users';
    header ('Location: index.php');
?>