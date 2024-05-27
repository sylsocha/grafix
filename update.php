<?php

$conn = new mysqli('localhost', 'root', '', 'grafix_database');
$sql = 'update users set imie=?, nazwisko=?, ulica=?, nr_domu=?, nr_mieszkania=?, miasto=?, kod_pocztowy=?, e_mail=?, nr_tel=? where id_user=1';

$prep=$conn->prepare($sql);

$prep->bind_param('sssiissss', $_POST['imie'], $_POST['nazwisko'], $_POST['ulica'], $_POST['nr_domu'], $_POST['nr_mieszk'], $_POST['miasto'], $_POST['kodpocztowy'], $_POST['email'], $_POST['nr_tel']);

var_dump($_POST);
echo '<br><hr>';
echo 'Edytowane rekordy: ' . $conn->affected_rows;
/*
header("Location: ./sum_up.php");
exit();*/
