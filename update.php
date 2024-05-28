<?php

var_dump($_POST);

$conn = new mysqli('localhost', 'root', '', 'grafix_database');

$sql0="select id_order from orders where id_user='$_POST[rodo]' and finalised=0";
$conn->query($sql0);
$record=$conn->query($sql0)->fetch_assoc();
$o_id=$record['id_order'];

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

if((float)$_POST['nr_mieszk']>0) {
    $sql2 = "update users set nr_mieszkania='$_POST[nr_mieszk]' where id_user=1";
    $conn->query($sql2);
}

$sql3="update orders set id_pay='$_POST[platnosc]',
                        id_ship='$_POST[dostawa]'
                        where id_order='$o_id'";
$conn->query($sql3);

if(isset($_POST['uwaga_znizka'])){
    $sql4 = "update orders set uwaga_znizka='$_POST[uwaga_znizka]',
                         znizka=0.05
                         where id_order='$o_id'";
    $conn->query($sql4);
}

/*obliczanie kwoty zamówienia*/
$kw_cal = 0;

$sql5="select cena_ship from shipment where id_ship='$_POST[dostawa]'";
$conn->query($sql5);
$ship=$conn->query($sql5)->fetch_assoc();

$sql6="select c.liczba_sztuk as sztuki,
              c.cena_unit as cena,
              o.znizka as znizka 
        from cart c join orders o on c.id_order=o.id_order
        where c.id_order='$o_id' and o.id_order='$o_id'";
$conn->query($sql6);
$wynik=$conn->query($sql6);
while($cart=$wynik->fetch_assoc()) {
    $kw_cal += (float)$cart['sztuki'] * (float)$cart['cena'] - (float)$cart['sztuki'] * (float)$cart['cena'] * (float)$cart['znizka'];
}

$kw_cal+=(float)$ship['cena_ship'];

$kw_cal=number_format($kw_cal, 2);

$sql7="update orders set kwota_calosc='$kw_cal' where id_order='$o_id'";
$conn->query($sql7);

header("Location: ./sum_up.php");
exit();
