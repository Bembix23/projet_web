<?php

    session_start();

    include("config.php");

    if ($_POST["titre"] == null || $_POST["description"] == null || $_POST["nb_place"] == null || $_POST["adresse"] == null || $_POST["ville"] == null || $_POST["prix_nuit"] == null){
        header("Location: index.php");
        exit;
    }


    $fileTmpName = $_FILES['file']['tmp_name'];
    
    $str_titre = strtolower($_POST["titre"]);

    $filename = "./annonces/".$str_titre;

    if (!file_exists($filename)) {
        mkdir($filename);
    }

    $fileDestination = $filename."/".$str_titre.".png";

    if (!file_exists($filename)){
        move_uploaded_file($fileTmpName, $fileDestination);
    }
    else {
        move_uploaded_file($fileTmpName, $fileDestination);
    }

    $query = $pdo->prepare("INSERT INTO ProjetWeb.annonce (id_annonceur, titre, description, nb_place, adresse, ville, prix_nuit)
        VALUES ('{$_SESSION["id"]}', '{$_POST["titre"]}', '{$_POST["description"]}', '{$_POST["nb_place"]}', '{$_POST["adresse"]}', '{$_POST["ville"]}', '{$_POST["prix_nuit"]}')
    ");
    $query->execute();

    header("Location: home.php");
    exit;

?>