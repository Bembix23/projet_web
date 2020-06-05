<?php
    include_once('config.php');

    session_start();

    $query2 = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE id_annonceur = '{$_SESSION["id"]}' AND id = '{$_GET["id"]}'");
    $query2->execute();
    $infos2 = $query2->fetch();
    

    $fileTmpName = $_FILES['new_image']['tmp_name'];
    
    $str_avatar = strtolower($infos2["titre"]);

    $filename = "./annonces/".$str_avatar;

    $fileDestination = $filename."/".$str_avatar.".png";

    move_uploaded_file($fileTmpName, $fileDestination);

    header("Location: mon_profil.php");
    exit;
?>