<?php

var_dump($_POST);

$conn = new mysqli('localhost', 'root', '', 'grafix_database');
$sql = "update users set imie='$_POST[imie]',
                         nazwisko='$_POST[nazwisko]',
                         ulica='$_POST[ulica]',
                         nr_domu='$_POST[nr_domu]',
                         miasto='$_POST[miasto]',
                         kod_pocztowy='$_POST[kodpocztowy]',
                         e_mail='$_POST[email]',
                         nr_tel=$_POST[nr_tel]
             where id_user=1";

$conn->query($sql);

if($_POST['nr_mieszk'] != null) {
    $sql2 = "update users set nr_mieszkania=$_POST[nr_mieszk] where id_user=1";
    $conn->query($sql);
}

/*$sql2 = "";*/

echo '<br><hr>';
echo 'Edytowane rekordy: ' . $conn->affected_rows;
/*
header("Location: ./sum_up.php");
exit();*/
