<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="styles/home_page.css" rel="stylesheet">
    <link href="styles/mobile.css" rel="stylesheet">
    <link href="styles/random&yeared.css" rel="stylesheet">
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

<main class="main_cat">
    <?php
    for($i = 0; $i <= 5; $i++)
    echo <<<END
    <div class="prod_in_cat">
        <img src="photos/calendars/dates/close-up-calendar-design.jpg" alt="produkt" class="prod_photo">
        <h3 class="nazw_prod">Nazwa produktu</h3>
        <p class="opis_mały">Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.</p>
        <a href="product.php"><img src="photos/icons/magnifying-glass-solid.png" class="icon_in_cat" alt="Zobacz produkt"></a>
        <a href=""><img src="photos/icons/cart-plus-solid_red.png" class="icon_in_cat" alt="Dodaj do koszyka"></a>
        <h2 class="cena">43,99zł</h2>
    </div>
END;
?>
    <div class="prod_in_cat">
        <img src="photos/calendars/dates/2023-monthly-calendar-still-life.jpg" alt="produkt" class="prod_photo">
        <h3 class="nazw_prod">Nazwa produktu</h3>
        <p class="opis_mały">Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.</p>
        <a href="product.php"><img src="photos/icons/magnifying-glass-solid.png" class="icon_in_cat" alt="Zobacz produkt"></a>
        <a href=""><img src="photos/icons/cart-plus-solid_red.png" class="icon_in_cat" alt="Dodaj do koszyka"></a>
        <h2 class="cena">73,69zł</h2>
    </div>

    <div class="prod_in_cat">
        <img src="photos/calendars/dates/desk-calendar-with-texts-english(1).jpg" alt="produkt" class="prod_photo">
        <h3 class="nazw_prod">Nazwa produktu</h3>
        <p class="opis_mały">Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.</p>
        <a href="product.php"><img src="photos/icons/magnifying-glass-solid.png" class="icon_in_cat" alt="Zobacz produkt"></a>
        <a href=""><img src="photos/icons/cart-plus-solid_red.png" class="icon_in_cat" alt="Dodaj do koszyka"></a>
        <h2 class="cena">83,59zł</h2>
    </div>

    <div class="prod_in_cat">
        <img src="photos/calendars/dates/top-view-desk-2021-calendar.jpg" alt="produkt" class="prod_photo">
        <h3 class="nazw_prod">Nazwa produktu</h3>
        <p class="opis_mały">Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.</p>
        <a href="product.php"><img src="photos/icons/magnifying-glass-solid.png" class="icon_in_cat" alt="Zobacz produkt"></a>
        <a href=""><img src="photos/icons/cart-plus-solid_red.png" class="icon_in_cat" alt="Dodaj do koszyka"></a>
        <h2 class="cena">47,89zł</h2>
    </div>
</main>

<footer>
</footer>

</body>
</html>