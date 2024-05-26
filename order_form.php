<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styles/home_page.css" rel="stylesheet">
    <link href="styles/order.css" rel="stylesheet">
    <link href="styles/contact.css" rel="stylesheet">
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
    <h2 class="h2_contact">dAne do zAmówieniA</h2>

    <div class="formularz">
        <input type="text" name="imie" placeholder='Imię' required>
        <input type="text" name="nazwisko" placeholder='Nazwisko' required>
        <input type="text" name="ulica" placeholder='Ulica' required>
        <input type="text" name="nr_domu" placeholder='Numer domu' required>
        <input type="text" name="nr_mieszk" placeholder='Numer mieszkania'>
        <input type="text" name="miasto" placeholder="Miasto">
        <input type="text" pattern="^\d{2}-\d{3}$" name="kodpocztowy" placeholder="Kod pocztowy">
        <input type="email" name="ad_email" id="ad_emial" placeholder="Adres e-mail" required>
        <input type="tel" placeholder="Numer telefonu" required>
        <label>
            <textarea name="zniżka" class="znizka" placeholder="Jeśli zamawiasz kalendarz z danego roku, podaj nam powód dlaczego wybierasz dany rok, a dostaniesz zniżkę 5%"></textarea>
        </label>

        <input type="checkbox" name="rodo" id="rodo" class="rodo">
        <label for="rodo">Akceptuję politykę prywatności</label>

        <div class="container_sposob">
            <h3 class="h3_sposob">sposób dostawy</h3>
            <label class="label_s">
                <input type="radio" name="dostawa" value="1" checked>Kurier Inpost
            </label>
            <label class="label_s">
                <input type="radio" name="dostawa" value="2">Kurier DPD
            </label>
            <label class="label_s">
                <input type="radio" name="dostawa" value="3">Poczta polska
            </label>
        </div>

        <div class="container_sposob">
            <h3 class="h3_sposob">sposób płatności</h3>
            <label class="label_s">
                <input type="radio" name="platnosc" value="1"checked>Karta
            </label>
            <label class="label_s">
                <input type="radio" name="platnosc" value="2">Kod BLIK
            </label>
            <label class="label_s">
                <input type="radio" name="platnosc" value="3">Żabsy
            </label>
        </div>

        <a href="sum_up.php" style="text-decoration: none"><button type="submit" name="wyslij" class="wyslij">Wyślij</button></a>
    </div>
</main>

<footer>
</footer>

</body>