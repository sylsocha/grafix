<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styles/home_page.css" rel="stylesheet">
    <link href="styles/order.css" rel="stylesheet">
    <link href="styles/sum_up.css" rel="stylesheet">
    <link href="styles/mobile.css" rel="stylesheet">
    <title>GRAFIX</title>
    <link rel="shortcut icon" type="image/png" href="photos/favikon.png">

    <!--import major mono display-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap" rel="stylesheet">

    <!--import urbanist-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="navbar">
    <a href="./index.html"><img src="photos/logo.png" class="logo" alt="LOGO"></a>
    <label class="hamburger">
        <input type="checkbox">
    </label>
    <nav>
        <div class="menu_elem"><a href="./index.html" class="a_menu">home</a></div>
        <div class="menu_elem"><a href="./log_in_form.html" class="a_menu">logowanie / rejestracja</a></div>
        <div class="menu_elem"><a href="./contact.html" class="a_menu">kontakt</a></div>
        <div class="menu_elem"><a href="./news.html" class="a_menu">aktualności</a></div>
        <div class="menu_elem"><a href="./cart.php" class="a_menu">koszyk</a></div>
    </nav>
</div>

<main>
    <?php

    $conn = new mysqli('localhost', 'root', '', 'grafix_database');

    $sql0="select id_order from orders where id_user=1 and finalised=0";
    $conn->query($sql0);
    $o_id=$conn->query($sql0)->fetch_assoc()['id_order'];

    $sql="select * from users where id_user=1";
    $conn->query($sql);
    $record=$conn->query($sql)->fetch_assoc();

    $sql2="select p.nazwa_pay as pay from payment p join orders o on p.id_pay=o.id_pay where o.id_order='$o_id'";
    $conn->query($sql2);
    $pay=$conn->query($sql2)->fetch_assoc()['pay'];

    $sql3="select s.nazwa_ship as ship from shipment s join orders o on s.id_ship=o.id_ship where o.id_order='$o_id'";
    $conn->query($sql3);
    $ship=$conn->query($sql3)->fetch_assoc()['ship'];

    $sql4="select p.photo_link as photo,p.nazwa_prod as nazwa, c.cena_unit as cena_u, c.liczba_sztuk as sztuki, o.kwota_calosc as calosc from cart c join product p on c.id_prod=p.id_prod join orders o on c.id_order=o.id_order where o.id_order='$o_id'";
    $conn->query($sql4);
    $wynik=$conn->query($sql4);


    echo<<<END
    <h1 style="margin: 3% auto; width:70%; text-align: center">podsumowanie</h1>
    <div class="dane">
        <h2 class="h2_sum_up">dane do zamówienia</h2>
        <h5 class="dana_sum">$record[imie] $record[nazwisko]</h5>
END;
        if(!isset($record['nr_mieszkania']))
            echo "<h5 class='dana_sum'>ul. $record[ulica] $record[nr_domu]</h5>";
        else
            echo "<h5 class='dana_sum'>ul. $record[ulica] $record[nr_domu]/$record[nr_mieszkania]</h5>";

        echo<<<END
        <h5 class="dana_sum">$record[kod_pocztowy] $record[miasto]</h5>
        <h5 class="dana_sum">$record[e_mail]</h5>
        <h5 class="dana_sum">+48 $record[nr_tel]</h5>
        <h5 class="dana_sum">$ship</h5>
        <h5 class="dana_sum">$pay</h5>
    </div>
END;

        while($cart=$wynik->fetch_assoc()){

        $caly_prod = $cart['sztuki'] * $cart['cena_u'];
        $calosc = number_format($cart['calosc'], 2);

        echo<<<END
        <div class="produkty">
            <div class="prod_in_sum">
                <img src='$cart[photo]' alt="produkt" class="prod_photo_sum">
                <h3 class="nazw_prod_sum">$cart[nazwa]</h3>
                <h4 class="h4_sum">Liczba sztuk: $cart[sztuki]</h4>
                <h4 class="h4_sum">Cena za sztukę: $cart[cena_u] zł</h4>
                <h4 class="h4_sum">Cena łączna: $caly_prod zł</h4>
            </div>
        </div>
END;
}

    echo<<<END
    <h1 style="margin: 3% auto; width:70%; text-align: center">$calosc zl</h1>

    <div class="sum_but_container">
        <a href="./cart.php"><button class="dalej_sum">Edytuj zamówienie</button></a>
        <a href="./finalise.php"><button class="dalej_sum">Przejdź do płatności</button></a>
    </div>
END;
?>

</main>
<footer>
</footer>
</body>