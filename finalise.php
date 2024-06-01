<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'grafix_database');
$sql = "update orders set finalised=1 where id_user='$_SESSION[user]' and finalised=0";
$conn->query($sql);

header("Location: ./thanks.php");
exit();
