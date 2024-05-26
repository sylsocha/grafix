<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="styles/home_page.css" rel="stylesheet">
    <link href="styles/mobile.css" rel="stylesheet">
    <link href="styles/cart.css" rel="stylesheet">
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
        <div class="menu_elem"><a href="cart.php" class="a_menu">koszyk</a></div>
    </nav>
</div>

<main>
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
            if($utworz['finalised'] != 0 && $num_row == $wynik->num_rows)
            {
                /*utwórz nowe zamówienie*/
                $sql3 = "insert into orders (id_user, kwota_calosc, uwaga_znizka, znizka, id_pay, id_ship)
                         select u.id_user, 0, NULL, NULL, 1, 1
                         from users u";
                $conn->query($sql3);
                $nr_zamowienia = $utworz['id_order'];
                echo "nowe";
            }
            else if($utworz['finalised'] == 0) {
                $nr_zamowienia = $utworz['id_order'];
                /*dodawaj do otwartedo zamówienia*/
                echo 'id:' . $utworz['id_order'] . ' finalised: ' . $utworz['finalised'];
            }
            else
                echo "hehe";
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
        echo "!!!!";
    }

    $sql5 = "insert ignore into cart (id_order, id_prod, liczba_sztuk, cena_unit)
             select $nr_zamowienia, $_GET[id_prod], $_GET[l_sztuk], p.cena_unit
             from product p";
    $conn->query($sql5);

    $sql6 = "select p.photo_link as p_photo,
             p.nazwa_prod as p_name,
             p.na_stanie as p_stan,
             p.cena_unit as p_cena_szt
             from product p join cart c on p.id_prod = c.id_prod";
    $wynik = $conn->query($sql6);

   /* $sql6 = "select O.id_user as o_user, U.id_user as u_user, U.imie as u_imie from orders O join users U on O.id_user = U.id_user";
    $wynik = $conn->query($sql6);

    if ($wynik->num_rows > 0) {
        while ($record = $wynik->fetch_assoc()) {
            echo '<h2>' . $record['o_user'] . ' ' . $record['u_user'] . ' ' . $record['u_imie'] . '</h2>';
        }
    } else {
        echo '<h2>No records found</h2>';
    }*/

    while(($record=$wynik->fetch_assoc()) != null) {
        $value = $record['p_cena_szt'] * $_GET['l_sztuk'];
        echo <<<END
        <div class="prod_in_cart">
        <img src="$record[p_photo]" alt="produkt" class="prod_photo">
        <a href="./product.php" style="text-decoration: none; color: black"><h3 class="nazw_prod">$record[p_name]</h3></a>
        <label class="label_select_sztuki">
            Liczba sztuk:
            <input type="number" class="select_sztuki" min="0" max="$record[p_stan]" name="l_sztuk" value="$_GET[l_sztuk]">
        </label>
        <a href="product.php" class="href_to_icon"><img src="photos/icons/trash-can-solid.png" class="icon_in_cart" alt="Usuń z koszyka"></a>
        <h2 class="cena_za_sztuke">Cena za sztukę: $record[p_cena_szt]</h2>
        <h2 class="cena_za_x_sztuk">Cena łączna: $value</h2>
    </div>
END;
    }
?>
    <a href="order_form.php"><button class="zamow">Zamów</button></a>
</main>

<footer>
</footer>

</body>
