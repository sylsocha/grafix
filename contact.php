<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styles/home_page.css" rel="stylesheet">
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
    <a href="./index.php"><img src="photos/logo.png" class="logo" alt="LOGO"></a>
    <label class="hamburger">
        <input type="checkbox">
    </label>
    <nav>
        <div class="menu_elem"><a href="./index.php" class="a_menu">home</a></div>
        <?php
        session_start();
        if(!isset($_SESSION['user']))
            echo "<div class='menu_elem'><a href='./log_in_form.php' class='a_menu'>zaloguj / zarejestruj</a></div>";
        else
            echo "<div class='menu_elem'><a href='./log_out.php' class='a_menu'>wyloguj</a></div>";
        ?>
        <div class="menu_elem"><a href="contact.php" class="a_menu">kontakt</a></div>
        <div class="menu_elem"><a href="news.php" class="a_menu">aktualności</a></div>
        <div class="menu_elem"><a href="./cart.php" class="a_menu">koszyk</a></div>
    </nav>
</div>
    <h2 class="h2_contact">formulArz kontAkowy</h2>

    <div class="formularz">
        <input type="text" name="imie" placeholder='Wpisz swoje imię' required>

        <input type="tel" placeholder="Podaj swój numer telefonu">

        <input type="email" name="ad_email" id="ad_emial" placeholder="Wpisz adres e-mail" required>
        <label for="ad_emial" class="label_email">*Na ten adres odeślemy naszą odpowiedź</label>

        <textarea name="uwaga" placeholder="Miejsce na Twoją wiadomość" required></textarea>

        <label for="file_upload" class="custom_file_upload">Załącz pliki</label>
        <input type="file" id="file_upload">

        <input type="checkbox" name="rodo" id="rodo" class="rodo">
        <label for="rodo">Akceptuję politykę prywatności</label>

        <button type="submit" name="wyslij" class="wyslij">Wyślij</button>
    </div>


    <footer>
    </footer>
</body>

</html>