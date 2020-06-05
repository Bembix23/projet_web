<?php 

    session_start();

    include_once('config.php');

    $query = $pdo->prepare("SELECT password, nom, prenom FROM ProjetWeb.profil WHERE mail_adress LIKE '{$_SESSION["email"]}'");
    $query->execute();
    $infos = $query->fetch();

    $password = password_verify($_POST['password'], $infos['password']);


    if ($password) {
        $query = $pdo->prepare("UPDATE ProjetWeb.profil
        SET nom = '{$_POST["new_nom"]}'
        WHERE mail_adress LIKE '{$_SESSION["email"]}'");

        $query->execute();


        $nom = strtolower($infos["nom"]);
        $prenom = strtolower($infos["prenom"]);

        $str_avatar = strtolower($infos["prenom"])."_".strtolower($infos["nom"]);
        $str_avatar2 = strtolower($infos["prenom"])."_".strtolower($_POST["new_nom"]);


        rename("./profils/{$str_avatar}/{$str_avatar}.png", "./profils/{$str_avatar}/{$str_avatar2}.png");

        rename("./profils/{$str_avatar}", "./profils/{$str_avatar2}");



        $_SESSION["nom"] = $_POST["new_nom"];

        header("Location: mon_profil.php");
        exit;
    }


?>