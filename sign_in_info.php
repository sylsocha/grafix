<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link href="styles/home_page.css" rel="stylesheet">
    <link href="styles/order.css" rel="stylesheet">
    <link href="styles/cart.css" rel="stylesheet">
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
    <a href="index.php"><img src="photos/logo.png" class="logo" alt="LOGO"></a>
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
        <div class="menu_elem"><a href="./contact.php" class="a_menu">kontakt</a></div>
        <div class="menu_elem"><a href="./news.php" class="a_menu">aktualności</a></div>
        <div class="menu_elem"><a href="./cart.php" class="a_menu">koszyk</a></div>
    </nav>
</div>


<main>
    <h1 style="margin: 3% auto 5% auto; text-align: center; font-size: 250%; position:relative;">rejestAcja przebiegła pomyślnie</h1>
    <a href="./log_in_form.php" id="a_thanks"><button class="zamow" id="a_thanks_button" style="text-decoration:none">Zaloguj się, aby kontynuować</button></a>
    <img src="./photos/Tiny%20man%20in%20front%20of%20giant%20calendar%20cartoon%20vector%20illustration.jpg" class="img_thanks" style="margin-bottom: 15%">
</main>

<footer>
</footer>

</body>

