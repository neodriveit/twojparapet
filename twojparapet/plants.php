<?php 
    session_start();
    $_SESSION['page'] = 'plants';
    header ('Location: index.php');
?>