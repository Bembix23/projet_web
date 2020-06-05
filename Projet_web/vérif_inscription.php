<?php

    session_start();

    include("config.php");

    if ($_POST["nom"] == null || $_POST["prenom"] == null || $_POST["password"] == null || $_POST["password2"] == null || $_POST["email"] == null){
        header("Location: index.php");
        exit;
    }

    else if ($_POST["password"] != $_POST["password2"]) {
        header("Location: index.php");
        exit;
    }

    $hachage = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = $pdo->prepare("INSERT INTO ProjetWeb.profil (nom, prenom, mail_adress, password, budget)
        VALUES ('{$_POST["nom"]}', '{$_POST["prenom"]}', '{$_POST["email"]}', '{$hachage}', '{$_POST["budget"]}')
    ");
    $query->execute();

    $_SESSION["nom"] = htmlspecialchars($_POST["nom"]);
    $_SESSION["password"] = htmlspecialchars($_POST["password"]);
    $_SESSION["prenom"] = htmlspecialchars($_POST["prenom"]);
    $_SESSION["email"] = htmlspecialchars($_POST["email"]);

    $_SESSION["IS_CONNECTED"] = TRUE;

    $fileTmpName = $_FILES['avatar']['tmp_name'];
    
    $str_nom = strtolower($_SESSION["nom"]);
    $str_prenom = strtolower($_SESSION["prenom"]);

    $fileTmpName = $_FILES['avatar']['tmp_name'];
    
    $str_avatar = strtolower($_POST["prenom"])."_".strtolower($_POST["nom"]);

    $filename = "./profils/".$str_avatar;

    if (!file_exists($filename)) {
        mkdir($filename);
    }

    $fileDestination = $filename."/".$str_avatar.".png";

    if (!file_exists($filename)){
        move_uploaded_file($fileTmpName, $fileDestination);
    }
    else {
        move_uploaded_file($fileTmpName, $fileDestination);
    }


    header("Location: deconnexion.php");
    exit;

?>