<?php
session_start();
require_once ('connection.php');
$polaczenie = @new mysqli ( $host, $db_user, $db_password, $db_name );
$result = $polaczenie->query("SET NAMES 'utf8'");
if(!isset($_SESSION['error'])) $_SESSION['error'] = NULL;
echo "<!DOCTYPE html>
<html lang=\"pl\">
<head>
    <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\">
    <title>Twoj parapet</title>
</head>
<body>";
?>