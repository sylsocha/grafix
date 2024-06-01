<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styles/home_page.css" rel="stylesheet">
    <link href="styles/mobile.css" rel="stylesheet">
    <link href="styles/log_in.css" rel="stylesheet">
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
    <a href="index.php"><img src="photos/logo.png" class="logo" alt="LOGO"></a>
    <label class="hamburger">
        <input type="checkbox">
    </label>
    <nav>
        <div class="menu_elem"><a href="index.php" class="a_menu">home</a></div>
        <div class="menu_elem"><a href="./log_in_form.php" class="a_menu">logowanie / rejestracja</a></div>
        <div class="menu_elem"><a href="./contact.html" class="a_menu">kontakt</a></div>
        <div class="menu_elem"><a href="./news.html" class="a_menu">aktualności</a></div>
        <div class="menu_elem"><a href="./cart.php" class="a_menu">koszyk</a></div>
    </nav>
</div>

<main id="main_log">
    <div class="log_form">
        <a href="#rejestracja" id="link_to_rej" class="log_form_button">Rejestracja</a>
        <a href="#logowanie" id="link_to_log" class="log_form_button">Logowanie</a>
        <img src="./photos/Tiny%20man%20in%20front%20of%20giant%20calendar%20cartoon%20vector%20illustration.jpg" class="log_photo" alt="Człowiek z kalendarzem">
    </div>


    <?php
    session_start();
    ?>

    <form action="./valid_rej.php" method="post" class="formularz_logowania" id="rejestracja">
        <img src="photos/icons/address-card-regular.png" class="ikona_log" alt="rejestracja">
        <h2>formulArz rejestrAcji</h2>

        <input type="text" name="imie" placeholder='Wpisz swoje imię*' required>
        <?php
            if (isset($_SESSION['errors']['e_imie'])) {
                echo "<p class='error'>{$_SESSION['errors']['e_imie']}</p>";
                unset ($_SESSION['errors']['e_imie']);
            }
        ?>

        <input type="text" name="nazwisko" placeholder='Wpisz swoje nazwisko*' required>
        <?php
        if (isset($_SESSION['errors']['e_nazwisko'])) {
            echo "<p class='error'>{$_SESSION['errors']['e_nazwisko']}</p>";
            unset ($_SESSION['errors']['e_nazwisko']);
        }
        ?>
        <input type="email" name="ad_email" id="ad_emial_rej" placeholder="Wpisz adres e-mail*" required>
        <?php
        if (isset($_SESSION['errors']['e_email'])) {
            echo "<p class='error'>{$_SESSION['errors']['e_email']}</p>";
            unset ($_SESSION['errors']['e_email']);
        }
        ?>
        <input type="password" name="haslo" placeholder="Wpisz hasło (min 8 znaków)*" required>
        <?php
        if (isset($_SESSION['errors']['e_haslo'])) {
            echo "<p class='error'>{$_SESSION['errors']['e_haslo']}</p>";
            unset ($_SESSION['errors']['e_haslo']);
        }
        ?>
        <input type="password" name="haslo_conf" placeholder="Powtórz hasło*" required>
        <?php
        if (isset($_SESSION['errors']['e_haslo_con'])) {
            echo "<p class='error'>{$_SESSION['errors']['e_haslo_con']}</p>";
            unset ($_SESSION['errors']['e_haslo_con']);
        }
        ?>
        <input type="tel" name="nr_tel" placeholder="Podaj swój numer telefonu*">
        <?php
        if (isset($_SESSION['errors']['e_tel'])) {
            echo "<p class='error'>{$_SESSION['errors']['e_tel']}</p>";
            unset ($_SESSION['errors']['e_tel']);
        }
        ?>
        <input type="checkbox" name="rodo" id="rodo" class="rodo" required>
        <label for="rodo">Akceptuję politykę prywatności</label>
        <h3>*Pola oznaczone gwiazdką, są obowiązkowe</h3>

        <button type="submit" name="wyslij" class="wyslij">Zarejestruj</button>
    </form>

    <form action="./valid_log.php" class="formularz_logowania" id="logowanie">
        <img src="photos/icons/circle-user-solid.png" class="ikona_log">
        <h2>formulArz logowAnia</h2>

        <input type="email" name="ad_email" id="ad_emial" placeholder="Wpisz adres e-mail" required>
        <?php
        if (isset($_SESSION['errors']['e_mail'])) {
            echo "<p class='error'>{$_SESSION['errors']['e_mail']}</p>";
            unset ($_SESSION['errors']['e_mail']);
        }
        ?>
        <input type="password" name="haslo" placeholder="Wpisz hasło" required>
        <?php
        if (isset($_SESSION['errors']['e_haslo'])) {
            echo "<p class='error'>{$_SESSION['errors']['e_haslo']}</p>";
            unset ($_SESSION['errors']['e_haslo']);
        }
        ?>
        <button type="submit" name="wyslij" class="wyslij">Zaloguj</button>
    </form>
</main>


<footer>
</footer>

</body>
</html>