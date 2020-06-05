<?php
    include('config.php');
    session_start();

    //Convertion des dates reçu(string) en vrai dates :
    $debut_jour = date('d',strtotime($_POST["Date_arrivé"]));
    $debut_mois = date('m',strtotime($_POST["Date_arrivé"]));
    $debut_annee = date('Y',strtotime($_POST["Date_arrivé"]));

    $fin_jour = date('d',strtotime($_POST["Date_départ"]));
    $fin_mois = date('m',strtotime($_POST["Date_départ"]));
    $fin_annee = date('Y',strtotime($_POST["Date_départ"]));

    $debut_date = mktime(0, 0, 0, $debut_mois, $debut_jour, $debut_annee);
    $fin_date = mktime(0, 0, 0, $fin_mois, $fin_jour, $fin_annee);

    $test=date('Y-m-d',strtotime($_POST["Date_arrivé"]));  
    $test2=date('Y-m-d',strtotime($_POST["Date_départ"]));

    if ($test2 <= $test) {
        header("Location: home.php");
        exit;
    }


    for($i = $debut_date; $i <= $fin_date; $i+=86400) {
        $x = date('Y-m-d',$i);
        $query = $pdo->prepare("SELECT date_réservation FROM ProjetWeb.date_de_réservation WHERE id_chambre = {$_GET['id']} AND date_réservation LIKE '{$x}'");
        $query->execute();
        $infos = $query->fetch();
        if (!empty($infos)){
            header("Location: home.php");
            exit;
        }
    }

    //Infos sur la chambre
    $query_chambre = $pdo->prepare("SELECT * FROM ProjetWeb.annonce
    WHERE id = {$_GET['id']}
    ");
    $query_chambre->execute();
    $infos_chambre = $query_chambre->fetch();


    if ($_POST["nombre_locataire"] > $infos_chambre["nb_place"]) {
        header("Location: recherche.php");
        exit;
    }




    $query_budget = $pdo->prepare("SELECT budget FROM ProjetWeb.profil
    WHERE id = {$_SESSION['id']}
    ");
    $query_budget->execute();
    $infos_budget = $query_budget->fetch();


    $query_budget2 = $pdo->prepare("SELECT budget FROM ProjetWeb.profil
    WHERE id = {$infos_chambre['id_annonceur']}
    ");
    $query_budget2->execute();
    $infos_budget2 = $query_budget2->fetch();


    $query_prix_total = $pdo->prepare("SELECT DATEDIFF('{$test2}', '{$test}')*{$infos_chambre['prix_nuit']}*{$infos_chambre['nb_place']} AS 'prix'
    ");
    $query_prix_total->execute();
    $infos_prix_total = $query_prix_total->fetch();

    $prix = (int)$infos_prix_total["prix"];
    $budget = (int)$infos_budget["budget"];


    if ($budget < $prix) {
        header("Location: pauvre.php");
        exit;
    }




    //Requête réservation
    $query2 = $pdo->prepare("INSERT INTO ProjetWeb.réservation (id_chambre, id_locataire, date_arrivé, date_départ, nb_nuit, prix_nuit)
    VALUES ({$_GET['id']}, {$_SESSION['id']}, '{$test}', '{$test2}', (SELECT DATEDIFF('{$test2}', '{$test}')), (SELECT prix_nuit FROM annonce WHERE id = {$_GET['id']}))
    ");
    $query2->execute();

    //Requête des dates réservés
    for($i = $debut_date; $i < $fin_date; $i+=86400) {
        $x = date('Y-m-d',$i);
        $query3 = $pdo->prepare("INSERT INTO ProjetWeb.date_de_réservation (id_chambre, date_réservation)
        VALUES ({$_GET['id']}, '{$x}')
        ");
        $query3->execute();
    }

    //Requête diminution du solde
    $query_new_budget = $pdo->prepare("UPDATE ProjetWeb.profil
    SET budget = {$infos_budget['budget']} - (SELECT DATEDIFF('{$test2}', '{$test}'))*{$infos_chambre['prix_nuit']}*{$_POST['nombre_locataire']}
    WHERE id = {$_SESSION['id']}
    ");
    $query_new_budget->execute();

    
    //Requête augmentation du solde
    $query_new_budget2 = $pdo->prepare("UPDATE ProjetWeb.profil
    SET budget = {$infos_budget2['budget']} + (SELECT DATEDIFF('{$test2}', '{$test}'))*{$infos_chambre['prix_nuit']}*{$_POST['nombre_locataire']}
    WHERE id = {$infos_chambre['id_annonceur']}
    ");
    $query_new_budget2->execute();


    //Requête mail de l'annonceur

    $query_mail = $pdo->prepare("SELECT DISTINCT p.mail_adress FROM ProjetWeb.profil p
    INNER JOIN ProjetWeb.annonce a
    ON a.id_annonceur = p.id
    WHERE a.id = {$_GET['id']}
    ");
    $query_mail->execute();
    $info_mail = $query_mail->fetch();


    //Mail
    $dest = $_SESSION["mail_adress"];
    $dest2 = $info_mail["mail_adress"];
    $sujet = "Email de test";
    $message = "Salut ceci est un email de test envoyer par un script PHP";
    $headers = "From: gauthier.michon@gmail.com";

    mail($dest, $sujet, $message, $headers);
    mail($dest2, $sujet, $message, $headers);

    header("Location: home.php");
    exit;


?>