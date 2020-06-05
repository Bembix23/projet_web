<?php 

    session_start();

    include_once('config.php');

    $query = $pdo->prepare("SELECT password, mail_adress FROM ProjetWeb.profil WHERE mail_adress LIKE '{$_SESSION["email"]}'");
    $query->execute();
    $infos = $query->fetch();

    $password = password_verify($_POST['password'], $infos['password']);


    if ($password) {
        $query = $pdo->prepare("UPDATE ProjetWeb.profil
        SET mail_adress = '{$_POST["new_email"]}'
        WHERE mail_adress LIKE '{$_SESSION["email"]}'");

        $query->execute();

        $_SESSION["email"] = $_POST["new_email"];

        header("Location: mon_profil.php");
        exit;
    }


?>