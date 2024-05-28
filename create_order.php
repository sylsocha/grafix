<?php
$conn = new mysqli('localhost', 'root', '', 'grafix_database');
$sql1 = "select id_order from orders where id_user = 1";
$conn->query($sql1);
$wynik = $conn->query($sql1);
$nr_zamowienia = 0;

if($wynik->num_rows>0) {

    $sql2 = "select id_order, finalised from orders where id_user = 1";
    $conn->query($sql2);
    $wynik = $conn->query($sql2);
    $num_row = 0;

    while(($utworz = $wynik->fetch_assoc())!= null) {
        $num_row++;
        if((int)$utworz['finalised'] == 1 && $num_row == $wynik->num_rows)
        {
            /*utwórz nowe zamówienie*/
            $sql3 = "insert into orders (id_user, kwota_calosc, uwaga_znizka, znizka, id_pay, id_ship)
                         select u.id_user, 0, NULL, NULL, 1, 1
                         from users u";
            $conn->query($sql3);
            $nr_zamowienia = $utworz['id_order'];
        }
        else if((int)$utworz['finalised'] == 0) {
            /*dodawaj do otwartedo zamówienia*/
            $nr_zamowienia = $utworz['id_order'];
        }
    }
}
else{
    /*utwórz nowe zamówienie*/
    $sql4 = "insert into orders (id_user, kwota_calosc, uwaga_znizka, znizka, id_pay, id_ship)
                 select u.id_user, 0, NULL, NULL, 1, 1
                 from users u";
    $conn->query($sql4);
    $wynik = $conn->query($sql1);
    $utworz = $wynik->fetch_assoc();
    $nr_zamowienia = $utworz['id_order'];
}
    $sql5 = "select finalised as fin from orders where id_user = 1 and id_order='$nr_zamowienia'";
    $conn->query($sql5);
    $final = $conn->query($sql5)->fetch_assoc()['fin'];


    $sql6 = "select count(*) as row from cart where id_order='$nr_zamowienia'";
    $conn->query($sql6);
    $row = $conn->query($sql6)->fetch_assoc()['row'];
    if($row == 0)
        $cart=-1;
    else
        $cart=1;

if(isset($_GET['id_prod']) & isset($_GET['l_sztuk'])) {   //tworzenie nowego koszyka przy wejściu przez produkt
    $sql5 = "insert ignore into cart (id_order, id_prod, liczba_sztuk, cena_unit)
             select $nr_zamowienia, $_GET[id_prod], $_GET[l_sztuk], p.cena_unit
             from product p where id_prod='$_GET[id_prod]'";
    $conn->query($sql5);
    return $nr_zamowienia;
}
else if(!isset($_GET['l_sztuk']) & isset($_GET['id_prod'])) {  //tworzenie nowego koszyka przy dodaniu artykułu z category.php
    $sql5 = "insert ignore into cart (id_order, id_prod, liczba_sztuk, cena_unit)
             select $nr_zamowienia, $_GET[id_prod], 1, p.cena_unit
             from product p where id_prod='$_GET[id_prod]'";
    $conn->query($sql5);
    return $nr_zamowienia;
}
else if($cart==-1 || $final=1){   //wejście do koszyka, gdy nie ma nowego zamówienia
    return -1;
}
else{
    return $nr_zamowienia;
}



