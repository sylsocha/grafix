<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="styles/home_page.css" rel="stylesheet">
    <link href="styles/mobile.css" rel="stylesheet">
    <link href="styles/product.css" rel="stylesheet">
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
    if($wynik->num_rows>0) {

        $sql2 = "select id_order, finalised from orders where id_user = 1";
        $conn->query($sql2);
        $wynik = $conn->query($sql2);
        $record = $wynik->fetch_assoc();
        if($record['finalised'] != 0)
        {

        }

        echo 'id:' . $record['id_order'] . ' finalised: ' . $record['finalised'];
    }
    else{
        $sql3 = "insert into orders (id_user, kwota_calosc, uwaga_znizka, znizka, id_pay, id_ship) select u.id_user, 0, NULL, NULL, 1, 1 from users u";
        $conn->query($sql3);
    }

    /*
    $sql2 = "insert into orders (id_user, kwota_calosc, uwaga_znizka, znizka, id_pay, id_ship) select u.id_user, 0, NULL, NULL, 2, 1 from users u";
    $conn->query($sql2);
    $sql3 = "select * from product where id_prod='$_GET[prod_view]'";
    $wynik = $conn->query($sql3);
    $record=$wynik->fetch_assoc();
    echo <<<END
    <div class="product">
        <img src="$record[photo_link]" alt="product" class="product_photo">
        <h3 class="nazwa_prod">$record[nazwa_prod]</h3>
        <p class="opis_duzy">$record[opis_long]</p>
        <form action="./cart.php" method="get" class="form_prod">
        <div class="icon_prod">
            <label class="lable_liczna_produtku">
                Podaj liczbę sztuk:
                <input type="number" placeholder="1 - 10" min='1' max='10' class="liczba_produktu" name="l_sztuk">
            </label>
            <input type="checkbox" name="id_prod" value=$record[id_prod] style="appearance: none; margin: 0; grid-column: 2" checked>
            <input type="submit" value="" class="add_to_cart" style="width: 100%; background-image: url('photos/icons/cart-plus-solid_red.png'); background-size: contain; background-repeat: no-repeat; background-position: center; cursor: pointer; color: #FFFFFF; border: #FFFFFF; margin: 0 auto 0 auto">
        </div>
        </form>
        
    </div>
END;
    */
    ?>
</main>

<footer>
</footer>

</body>