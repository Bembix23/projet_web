<?php 

    session_start();

    include_once('config.php');

    $query = $pdo->prepare("SELECT password, prenom, nom FROM ProjetWeb.profil WHERE mail_adress LIKE '{$_SESSION["email"]}'");
    $query->execute();
    $infos = $query->fetch();

    $password = password_verify($_POST['password'], $infos['password']);


    if ($password) {
        $query = $pdo->prepare("UPDATE ProjetWeb.profil
        SET prenom = '{$_POST["new_prenom"]}'
        WHERE mail_adress LIKE '{$_SESSION["email"]}'");

        $query->execute();


        $nom = strtolower($infos["nom"]);
        $prenom = strtolower($infos["prenom"]);

        $str_avatar = strtolower($infos["prenom"])."_".strtolower($infos["nom"]);
        $str_avatar2 = strtolower($_POST["new_prenom"])."_".strtolower($infos["nom"]);


        rename("./profils/{$str_avatar}/{$str_avatar}.png", "./profils/{$str_avatar}/{$str_avatar2}.png");

        rename("./profils/{$str_avatar}", "./profils/{$str_avatar2}");




        $_SESSION["prenom"] = $_POST["new_prenom"];

        header("Location: mon_profil.php");
        exit;
    }


?>