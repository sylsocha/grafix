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
        <div class="menu_elem"><a href="cart.php" class="a_menu">koszyk</a></div>
    </nav>
</div>

<main>
    <h1 style="margin: 3% auto; width:70%; text-align: center">podsumowanie</h1>
    <div class="dane">
        <h2 class="h2_sum_up">dane do zamówienia</h2>
        <h5 class="dana_sum">Imie i Nazwisko</h5>
        <h5 class="dana_sum">Adres</h5>
        <h5 class="dana_sum">Miasto i kod pocztowy</h5>
        <h5 class="dana_sum">Adres e-mail</h5>
        <h5 class="dana_sum">Numer telefonu</h5>
        <h5 class="dana_sum">Sposób dostawy</h5>
        <h5 class="dana_sum">Sposób płatności</h5>
    </div>
    <div class="produkty">
        <div class="prod_in_sum">
            <img src="photos/calendars/no_dates/wooden.jpg" alt="produkt" class="prod_photo_sum">
            <h3 class="nazw_prod_sum">Nazwa produktu</h3>
            <h4 class="h4_sum">Liczba sztuk: z bazy</h4>
            <h4 class="h4_sum">Cena za sztukę: 43,99zł</h4>
            <h4 class="h4_sum">Cena łączna: z bazy x 43,99zł</h4>
        </div>
    </div>

    <div class="sum_but_container">
        <a href="cart.php"><button class="dalej_sum">Edytuj zamówienie</button></a>
        <a href="./thanks.html"><button class="dalej_sum">Przejdź do płatności</button></a>
    </div>


</main>
<footer>
</footer>
</body>