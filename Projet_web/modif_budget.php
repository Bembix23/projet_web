<?php 

    session_start();

    include_once('config.php');

    $query = $pdo->prepare("SELECT password, budget FROM ProjetWeb.profil WHERE mail_adress LIKE '{$_SESSION["email"]}'");
    $query->execute();
    $infos = $query->fetch();

    $password = password_verify($_POST['password'], $infos['password']);


    if ($password) {
        $query = $pdo->prepare("UPDATE ProjetWeb.profil
        SET budget = '{$_POST["new_budget"]}'
        WHERE mail_adress LIKE '{$_SESSION["email"]}'");

        $query->execute();

        $_SESSION["budget"] = $_POST["new_budget"];

        header("Location: mon_profil.php");
        exit;
    }


?>