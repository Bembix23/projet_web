<?php 

    session_start();

    include_once('config.php');

    $query2 = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE id_annonceur = '{$_SESSION["id"]}' AND id = '{$_GET["id"]}'");
    $query2->execute();
    $infos2 = $query2->fetch();


    if (!empty($_POST["new_titre"])) {
        $query = $pdo->prepare("UPDATE ProjetWeb.annonce
        SET titre = '{$_POST["new_titre"]}'
        WHERE id = '{$_GET["id"]}'");

        $titre = strtolower($infos2["titre"]);


        rename("./annonces/{$titre}/{$titre}.png", "./annonces/{$titre}/{$_POST['new_titre']}.png");

        rename("./annonces/{$titre}", "./annonces/{$_POST['new_titre']}");


        $query->execute();

        header("Location: mon_profil.php");
        exit;
    }


?>