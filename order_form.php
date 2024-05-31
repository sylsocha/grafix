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
    <a href="index.php"><img src="photos/logo.png" class="logo" alt="LOGO"></a>
    <label class="hamburger">
        <input type="checkbox">
    </label>
    <nav>
        <div class="menu_elem"><a href="index.php" class="a_menu">home</a></div>
        <div class="menu_elem"><a href="log_in_form.php" class="a_menu">logowanie / rejestracja</a></div>
        <div class="menu_elem"><a href="./contact.html" class="a_menu">kontakt</a></div>
        <div class="menu_elem"><a href="./news.html" class="a_menu">aktualności</a></div>
        <div class="menu_elem"><a href="./cart.php" class="a_menu">koszyk</a></div>
    </nav>
</div>

<main>
    <h2 class="h2_contact">dAne do zAmówieniA</h2>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'grafix_database');
    $sql1 = "select * from users where id_user = 1";
    $conn->query($sql1);
    $wynik = $conn->query($sql1);
    $record=$wynik->fetch_assoc();

    //sprawdzanie, czy jest zalogowany?
    if($record['id_user'] == null){
        header("Location: ./log_in_form.php");
        exit();
    }

    echo<<<END
    <form class="formularz" action="./update.php" method="post">
        <input type="text" name="imie" value='$record[imie]'>
        <input type="text" name="nazwisko" value='$record[nazwisko]'>
END;
        if($record['ulica'] == null)
            echo "<input type='text' name='ulica' placeholder='Ulica' required>";
        else
            echo "<input type='text' name='ulica' value='$record[ulica]'>";

        if($record['nr_domu'] == null)
            echo "<input type='text' name='nr_domu' placeholder='Numer domu' value='$record[nr_domu]' required>";
        else
            echo "<input type='text' name='nr_domu' value='$record[nr_domu]'>";

        if($record['nr_mieszkania'] == null)
            echo "<input type='text' name='nr_mieszk' placeholder='Numer Mieszkania'>";
        else
            echo "<input type='text' name='nr_mieszk' value='$record[nr_mieszkania]'>";

        if($record['miasto'] == null)
            echo "<input type='text' name='miasto' placeholder='Miasto' required>";
        else
            echo "<input type='text' name='miasto' value='$record[miasto]'>";

        if($record['kod_pocztowy'] == null)
            echo "<input type='text' pattern='^\d{2}-\d{3}' name='kodpocztowy' placeholder='Kod pocztowy' required>";
        else
            echo "<input type='text' pattern='^\d{2}-\d{3}' name='kodpocztowy' value='$record[kod_pocztowy]'>";

    echo<<<END
        <input type="email" name="email" id="emial" value="$record[e_mail]">
        <input type="tel" name='nr_tel' value="$record[nr_tel]">
        <label>
            <textarea name="uwaga_znizka" class="znizka" placeholder="Jeśli zamawiasz kalendarz z danego roku, podaj nam powód dlaczego wybierasz dany rok, a dostaniesz zniżkę 5%"></textarea>
        </label>
        
        <input type="checkbox" name="rodo" id="rodo" class="rodo" value="$record[id_user]" required>
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

        <input type="submit" name="wyslij" class="wyslij">
    </form>
END;


?>
</main>

<footer>
</footer>

</body>