<?php 

  session_start();

  include_once('config.php');

  $query1 = $pdo->prepare("SELECT * FROM ProjetWeb.profil WHERE mail_adress LIKE '{$_POST["email"]}'");
  $query1->execute();
  $infos = $query1->fetch();

  
  if($infos == null){
    header("Location: index.php");
    exit;
  }
  $password = password_verify($_POST['password'], $infos['password']);
  if (!$infos)
  {
    header("Location: connexion.php");
    exit;
  }
  else
  {
    if ($password) {

      $_SESSION["IS_CONNECTED"] = TRUE;

      $_SESSION["prenom"] = htmlspecialchars($infos["prenom"]);

      $_SESSION["mail_adress"] = htmlspecialchars($infos["mail_adress"]);

      $_SESSION["nom"] = htmlspecialchars($infos["nom"]);

      $_SESSION["email"] = htmlspecialchars($_POST["email"]);

      $_SESSION["password"] = htmlspecialchars($_POST["password"]);

      $_SESSION["budget"] = htmlspecialchars($infos["budget"]);

      $_SESSION["id"] = htmlspecialchars($infos["id"]);

      header("Location: home.php");
      exit;
    }
    else {
      header("Location: connexion.php");
      exit;
    }
  }
?>