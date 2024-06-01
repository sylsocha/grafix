<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = trim($_POST["imie"]);
    $nazwisko = trim($_POST["nazwisko"]);
    $email = trim($_POST["ad_email"]);
    $haslo = $_POST["haslo"];
    $haslo_conf = $_POST["haslo_conf"];
    $tel = $_POST["nr_tel"];
    $pop_dane = true;
    $_SESSION['errors'] = [];

    // Validate name
    if (!preg_match("/^[a-zA-Z ]*$/", $imie)) {
        $pop_dane=false;
        $_SESSION['errors']['e_imie'] = "Imię może zawierać tylko litery.";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $nazwisko)) {
        $pop_dane=false;
        $_SESSION['errors']['e_nazwisko'] = "Nazwisko może zawierać tylko litery.";
    }


    //CZY PODANY E_MAIL JEST JUŻ W BAZIE

    $conn = new mysqli('localhost', 'root', '', 'grafix_database');
    $sql1 = "select count(e_mail) as email from users where e_mail='$email'";
    $conn->query($sql1);
    $email_count = $conn->query($sql1)->fetch_assoc()['email'];

    if ($email_count!=0) {
        $pop_dane=false;
        $_SESSION['errors']['e_email'] = "Podany adres e-mail jest już zaresejstrowany.";
    }

    // MIN 8 ZNAKÓW W HAŚLE
    if (strlen($haslo) < 8) {
        $pop_dane=false;
        $_SESSION['errors']['e_haslo'] = "Hasło musi składać się z minimum 8 znaków.";
    }

    // CZY HASŁA SĄ TE SAME
    if ($haslo !== $haslo_conf) {
        $pop_dane=false;
        $_SESSION['errors']['e_haslo_con'] = "Hasła nie są identyczne.";
    }

    if(strlen($tel)!=9 || !preg_match("/^[0-9]*$/", $tel)){
        $pop_dane=false;
        $_SESSION['errors']['e_tel'] = "Numer telefonu musi skłądać się z 9 cyfr.";
    }

    // POWRÓT DO RORMULARZA REJESTRACJI JEŚLI WYSTĘPUJĄ BŁĘDY
    if (!$pop_dane) {
        header("Location: log_in_form.php");
        exit();
    }else{
        $sql2="insert into users set imie='$imie', nazwisko='$nazwisko', haslo='$haslo', e_mail='$email', nr_tel='$tel'";
        $conn->query($sql2);
        unset($_SESSION['errors']);
        header("Location: sign_in_info.php");
        exit();
    }
}