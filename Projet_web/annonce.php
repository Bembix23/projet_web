<?php
    include('config.php');
    session_start();

    $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE id = {$_GET['id']}");
    $query->execute();
    $infos = $query->fetch();
    
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Mes offres</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <img src="logo.png">
            <a href="recherche.php">Retour</a>
                <?php
                    echo "<div>";
                    $str_titre = strtolower($infos["titre"]);

                    $fileDestination = "./annonces/".$str_titre."/".$str_titre.".png";

                    echo "<h2>{$infos['titre']}</h2><br>";
                    echo "<img src={$fileDestination}><br>";

                    echo "{$infos['description']}";
                    echo "</div>";
                    //echo "<a href='réservation.php?id={$infos["id"]}'>Réserver</a>";

                ?>
                <?php if (!empty($_SESSION["IS_CONNECTED"])) {
                    echo "<form action='réservation.php?id={$infos["id"]}' method='post'>" ?>
                    <input type="number" name="nombre_locataire" placeholder="Nombre de locataire" />
                    <input type="date" name="Date_arrivé" placeholder="Date d'arrivé" />
                    <input type="date" name="Date_départ" placeholder="Date de départ" />
                    <button type="submit">Envoyer</button>
                </form>
                <?php }
                    else {
                        echo "Vous devez être connecté pour réservé un bien";
                        echo '<a href="connexion.php" class = "link_home">Connexion</a>
                        <a href="inscription.php" class = "link_home">Inscription</a><br>';
                    }
                ?>
                <p>Mon id est : <?php echo $_GET['id'] ?>
        </body>
    </html>

                
                    
                