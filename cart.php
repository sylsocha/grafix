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
    for($i=0; $i<3; $i++)
    echo <<<END
    <div class="prod_in_cart">
        <img src="photos/calendars/no_dates/birthday-reminders-calendar-silver-stars.jpg" alt="produkt" class="prod_photo">
        <a href="product.html" style="text-decoration: none; color: black"><h3 class="nazw_prod">Nazwa produktu</h3></a>
        <label class="label_select_sztuki">
            Liczba sztuk:
            <select class="select_sztuki">
                <option>z bazy</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
        </label>
        <a href="product.html" class="href_to_icon"><img src="photos/icons/trash-can-solid.png" class="icon_in_cart" alt="Usuń z koszyka"></a>
        <h2 class="cena_za_sztuke">Cena za sztukę: 43,99zł</h2>
        <h2 class="cena_za_x_sztuk">Cena łączna: z bazy x 43,99zł</h2>
    </div>
END;

?>
    <a href="./order_form.html"><button class="zamow">Zamów</button></a>
</main>

<footer>
</footer>

</body>
