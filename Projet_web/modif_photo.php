<?php
    include_once('config.php');

    session_start();

    $fileTmpName = $_FILES['avatar']['tmp_name'];
    
    $str_avatar = strtolower($_SESSION["prenom"])."_".strtolower($_SESSION["nom"]);

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

    header("Location: mon_profil.php");
    exit;
?>