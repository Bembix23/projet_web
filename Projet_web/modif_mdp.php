<?php 

    session_start();

    include_once('config.php');

    $query = $pdo->prepare("SELECT password, mail_adress FROM ProjetWeb.profil WHERE mail_adress LIKE '{$_SESSION["email"]}'");
    $query->execute();
    $infos = $query->fetch();

    $password = password_verify($_POST['password'], $infos['password']);

    $hachage2 = password_hash($_POST['new_password'], PASSWORD_DEFAULT);


    if ($password) {
        $query = $pdo->prepare("UPDATE ProjetWeb.profil
        SET password = '{$hachage2}'
        WHERE mail_adress LIKE '{$_SESSION["email"]}'");

        $query->execute();

        $_SESSION["password"] = $_POST["new_password"];

        header("Location: mon_profil.php");
        exit;
    }


?>