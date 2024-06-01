<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["ad_email"]);
    $haslo = $_POST["haslo"];
    $pop_dane = true;
    $_SESSION['sign_in'] = "";


    $conn = new mysqli('localhost', 'root', '', 'grafix_database');
    $sql1 = "select count(e_mail) as email, haslo from users where e_mail='$email'";
    $conn->query($sql1);

    $email_count = $conn->query($sql1)->fetch_assoc()['email'];
    $h_baza= $conn->query($sql1)->fetch_assoc()['haslo'];

    if ($email_count==0 || !password_verify($haslo, $h_baza)) {
        $pop_dane=false;
        $_SESSION['sign_in'] = "Nieprawidłowy adres e-mail lub hasło.";
    }

    // POWRÓT DO RORMULARZA REJESTRACJI JEŚLI WYSTĘPUJĄ BŁĘDY
    if (!$pop_dane) {
        header("Location: log_in_form.php");
        exit();
    }else{
        unset($_SESSION['sign_in']);
        header("Location: index.php");
        exit();
    }
}
