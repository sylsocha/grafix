<?php

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

if(isset($_POST['nr_mieszk'])) {
    $sql2 = "update users set nr_mieszkania='$_POST[nr_mieszk]' where id_user=1";
    $conn->query($sql2);
}

$sql3="update orders set id_pay='$_POST[platnosc]',
                        id_ship='$_POST[dostawa]'
                        where id_user=1 and finalised=0";
$conn->query($sql3);

$kw_cal = 0;

$sql4="select cena_ship from shipment where id_ship='$_POST[dostawa]'";
$conn->query($sql4);
$ship=$conn->query($sql4)->fetch_assoc();

$sql5="select * from cart where id_order=2";
$conn->query($sql5);
$wynik=$conn->query($sql5);
while($cart=$wynik->fetch_assoc()){
var_dump($cart);
    echo'<br>';}



$sql6="select * from orders where id_order=2";
$conn->query($sql6);
$order=$conn->query($sql6)->fetch_assoc();
var_dump($order);

$kw_cal=(float)$ship["cena_ship"];


if(isset($_POST['uwaga_znizka'])){
    $sql7 = "update orders set uwaga_znizka='$_POST[uwaga_znizka]',
                         znizka=0.05
                         where id_user=1 and finalised=0";
    $conn->query($sql7);
}
/*
$sql7="update orders set kwota_calosc='$kw_cal' where id_user=1 and finalised=0";
$conn->query($sql7);
*/
echo '<br><hr>';
echo 'Edytowane rekordy: ' . $conn->affected_rows;
/*
header("Location: ./sum_up.php");
exit();*/
