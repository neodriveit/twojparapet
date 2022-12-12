<?php
	$_SESSION['login1'] = $_POST['user'];
	$_SESSION['id'] = $_POST['id'];
    $_SESSION['page'] = 'plants';
header('Location: index.php');
?>