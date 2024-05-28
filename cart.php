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
        <div class="menu_elem"><a href="./cart.php" class="a_menu">koszyk</a></div>
    </nav>
</div>

<main>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'grafix_database');

    $nr_zamowienia = include_once('create_order.php');

    if($nr_zamowienia == -1)
    {
        echo "<h1 style='margin: 5% auto; width:70%; text-align: center'>ups! jeszcze nic tu nie ma, wróć do strony głównej aby zacząć zamówienie</h1>";
        echo "<a href='./index.html' id='a_thanks'><button class='zamow' id='a_thanks_button style='text-decoration: none'>Powrót do strony głównej</button></a>";
    }
    else {

        $sql2 = "select p.photo_link as p_photo,
             p.nazwa_prod as p_name,
             p.na_stanie as p_stan,
             p.cena_unit as p_cena_szt,
             c.liczba_sztuk as c_l_sztuk,
             c.id_order as id_order,
             c.id_prod as id_prod
             from product p join cart c on p.id_prod = c.id_prod where c.id_order=$nr_zamowienia";
        $wynik = $conn->query($sql2);

        while (($record = $wynik->fetch_assoc()) != null) {
            $value = $record['p_cena_szt'] * $record['c_l_sztuk'];
            echo <<<END
        <div class="prod_in_cart">
        <img src="$record[p_photo]" alt="produkt" class="prod_photo_cart">
        <form action="./product.php" method="get">
            <input type="submit" class="nazw_prod_cart" value="$record[p_name]" name="p_name" style="font-family: 'Urbanist', sans-serif; font-weight: 700; border: none; text-align: left">
        </form>
        <h2 class="label_select_sztuki"> Liczba sztuk: $record[c_l_sztuk]</h2>
        <form method="post" action="./delete.php" class="href_to_icon">
            <input type="checkbox" name="id_order" value=$record[id_order] style="appearance: none; margin: 0;" checked>
            <input type="checkbox" name="id_prod" value=$record[id_prod] style="appearance: none; margin: 0;" checked>
            <input type="submit" value="" class="icon_in_cart" style="height: 60%; width: 80%; background-image: url('photos/icons/trash-can-solid.png'); background-size: contain; background-repeat: no-repeat; background-position: center; cursor: pointer; color: #FFFFFF; border: #FFFFFF""></input>
        </form>
        
        <h2 class="cena_za_sztuke">Cena za sztukę: $record[p_cena_szt] zł</h2>
        <h2 class="cena_za_x_sztuk">Cena łączna: $value zł</h2>
    </div>
END;
        }

        echo '<a href="./order_form.php"><button class="zamow">Zamów</button></a>';
    }
?>
</main>

<footer>
</footer>

</body>
