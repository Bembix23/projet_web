<?php
    include_once('config.php');

    session_start();

    $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE id_annonceur = '{$_SESSION["id"]}' AND id = '{$_GET["id"]}'");
    $query->execute();
    $infos = $query->fetch();

    $query2 = $pdo->prepare("SELECT * FROM ProjetWeb.date_de_réservation WHERE id_chambre = '{$_GET["id"]}'");
    $query2->execute();
    $infos2 = $query2->fetch();

    if (!empty($infos2)) {
        $query3 = $pdo->prepare("DELETE FROM ProjetWeb.date_de_réservation WHERE id_chambre = '{$_GET["id"]}'");
        $query3->execute();
    }

    if (!empty($infos2)) {
        $query3 = $pdo->prepare("DELETE FROM ProjetWeb.réservation WHERE id_chambre = '{$_GET["id"]}'");
        $query3->execute();
    }

    $query4 = $pdo->prepare("DELETE FROM ProjetWeb.annonce WHERE id = '{$_GET["id"]}'");
    $query4->execute();

    
    $str_avatar = strtolower($infos["titre"]);

    unlink("./annonces/".$str_avatar."/".$str_avatar.".png");

    rmdir("./annonces/".$str_avatar);

    header("Location: mon_profil.php");
    exit;
?>