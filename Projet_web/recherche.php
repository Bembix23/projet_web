<?php
    include('config.php');
    session_start();

    //Création d'une variable de session si le champ de filtrage ville est rempli. Sinon mettre sa valeur à null.
    if (!empty($_POST["ville"])){
        $_SESSION["ville"] = $_POST["ville"];
    } else {
        $_SESSION["ville"] = NULL;
    }

    //Création d'une variable de session si le champ de filtrage nombre de voyageur est rempli. Sinon mettre sa valeur à null.
    if (!empty($_POST["nb_voyageur"])){
        $_SESSION["nb_voyageur"] = $_POST["nb_voyageur"];
    } else {
        $_SESSION["nb_voyageur"] = NULL;
    }

    //Création d'une variable de session si le champ de filtrage prix maximum de la chambre est rempli. Sinon mettre sa valeur à null.
    if (!empty($_POST["prix_max"])){
        $_SESSION["prix_max"] = $_POST["prix_max"];
    } else {
        $_SESSION["prix_max"] = NULL;
    }

    //Création de variables de session si les champs de filtrage de date sont rempli. Sinon mettre leurs valeurs à null.
    if (!empty($_POST["Date_arrivé"]) && !empty($_POST["Date_départ"])){
        $_SESSION["Date_arrivé"] = $_POST["Date_arrivé"];
        $_SESSION["Date_départ"] = $_POST["Date_départ"];
        $test=date('Y-m-d',strtotime($_SESSION["Date_arrivé"]));
        $test2=date('Y-m-d',strtotime($_SESSION["Date_départ"]));
    } else {
        $_SESSION["Date_arrivé"] = NULL;
        $_SESSION["Date_départ"] = NULL;
    }
    
    
    //On rentre dans la boucle si un utilisateur est connecté
    if (isset($_SESSION["id"])) {
        //Trie en fontion des champs de filtrage remplis et n'affiche pas ses propres annonces

        //Ici on trie par ville, nombre de voyageur et prix maximum de la chambre
        if (!empty($_SESSION["ville"]) && !empty($_SESSION["nb_voyageur"]) && !empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND nb_place = {$_SESSION["nb_voyageur"]} AND prix_nuit <= {$_SESSION["prix_max"]} AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
    
        //Ici on trie par ville et prix maximum de la chambre
        else if (!empty($_SESSION["ville"]) && !empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND prix_nuit <= {$_SESSION["prix_max"]} AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
    
        //Ici on trie par nombre de voyageur et prix maximum de la chambre
        else if (!empty($_SESSION["nb_voyageur"]) && !empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE nb_place = {$_SESSION["nb_voyageur"]} AND prix_nuit <= {$_SESSION["prix_max"]} AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
    
        //Ici on trie par ville et nombre de voyageur de la chambre
        else if (!empty($_SESSION["ville"]) && !empty($_SESSION["nb_voyageur"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND nb_place = {$_SESSION["nb_voyageur"]} AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }

        //Ici on trie par ville
        else if (!empty($_SESSION["ville"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }

        //Ici on trie par nombre de voyageur
        else if (!empty($_SESSION["nb_voyageur"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE nb_place = '{$_SESSION["nb_voyageur"]}' AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }

        //Ici on trie par prix maximum de la chambre
        else if (!empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE prix_nuit <= '{$_SESSION["prix_max"]}' AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }

        //Ici on affiche tout sauf ses propres annonces
        else {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
    }

    else {
        //Trie en fontion des champs de filtrage remplis et n'affiche pas ses propres annonces

        //Ici on trie par ville, nombre de voyageur et prix maximum de la chambre
        if (!empty($_SESSION["ville"]) && !empty($_SESSION["nb_voyageur"]) && !empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND nb_place >= {$_SESSION["nb_voyageur"]} AND prix_nuit <= {$_SESSION["prix_max"]}");
            $query->execute();
        }

        //Ici on trie par ville et prix maximum de la chambre
        else if (!empty($_SESSION["ville"]) && !empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND prix_nuit <= {$_SESSION["prix_max"]}");
            $query->execute();
        }

        //Ici on trie par nombre de voyageur et prix maximum de la chambre
        else if (!empty($_SESSION["nb_voyageur"]) && !empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE nb_place >= {$_SESSION["nb_voyageur"]} AND prix_nuit <= {$_SESSION["prix_max"]}");
            $query->execute();
        }

        //Ici on trie par ville et nombre de voyageur de la chambre
        else if (!empty($_SESSION["ville"]) && !empty($_SESSION["nb_voyageur"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND nb_place >= {$_SESSION["nb_voyageur"]}");
            $query->execute();
        }

        //Ici on trie par ville
        else if (!empty($_SESSION["ville"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}'");
            $query->execute();
        }

        //Ici on trie par nombre de voyageur
        else if (!empty($_SESSION["nb_voyageur"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE nb_place >= '{$_SESSION["nb_voyageur"]}'");
            $query->execute();
        }

        //Ici on trie par prix maximum de la chambre
        else if (!empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE prix_nuit <= '{$_SESSION["prix_max"]}'");
            $query->execute();
        }

        //Ici on affiche toutes les annonces
        else {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce");
            $query->execute();
        }
    }

?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Les offres</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <img class="logo_X" src="logo.png">
                <!-- On rentre dans la boucle si les variable de session de dates existes et sont différentes de NULL -->
                <?php if (isset($_SESSION["Date_arrivé"]) && isset($_SESSION["Date_départ"])) {
                    $x = array();
                    while($infos = $query->fetch()) {

                        //Requête qui affiche les dates réservés pour chaques chambres et que les dates sont comprisent entre la date d'arrivé et la date de départ
                        $query1 = $pdo->prepare("SELECT * FROM ProjetWeb.date_de_réservation
                        WHERE id_chambre = {$infos['id']}
                        AND date_réservation BETWEEN '{$test}' AND '{$test2}'");
                        $query1->execute();
                        $infos1 = $query1->fetch();

                        //Rentre dans le if si aucune date n'est réservé entre la date d'arrivé et la date de départ, pour chaque annonce
                        if (empty($infos1)) {

                            //Affiche les annonces

                            $str_titre = strtolower($infos["titre"]);

                            $fileDestination = "./annonces/".$str_titre."/".$str_titre.".png";
                            echo '<div class="container">';
                                echo '<div class="card">';
                                    echo '<div class="item">';
                                        ?><img class="img" <?php echo "src= {$fileDestination}"?>> <?php
                                        echo "<h2 class='Atit'>{$infos['titre']}</h2><br>";
                                        echo "<h3 class='Ddes'>{$infos['description']}</h3>";
                                        echo "<a class='button' href='annonce.php?id={$infos["id"]}'>Destination</a>";
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';

                        }
                        }
                    }
                    else {

                        while($infos = $query->fetch()) {


                            $str_titre = strtolower($infos["titre"]);

                            $fileDestination = "./annonces/".$str_titre."/".$str_titre.".png";
                            
                            echo '<div class="container">';
                                echo '<div class="card">';
                                    echo '<div class="item">';
                                        ?><img class="img" <?php echo "src= {$fileDestination}"?>> <?php
                                        echo "<h2 class='Atit'>{$infos['titre']}</h2><br>";
                                        echo "<h3 class='Ddes'>{$infos['description']}</h3>";
                                        echo "<a class='button' href='annonce.php?id={$infos["id"]}'>Destination</a>";
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            
                            }
                        }
                    ?>

                <a href="index.php" class = "link_home">Retour</a>
                <script type="text/javascript">
                    const buttons = document.querySelectorAll('a');
                    buttons.forEach(btn => {
                        btn.addEventListener('click', function(e) {

                            let x = e.clientX - e.target.offsetLeft;
                            let y = e.clientY - e.target.offsetTop;

                            let ripples = document.createElement('span');
                            ripples.style.left = x + 'px';
                            ripples.style.top = y + 'px';
                            this.appendChild(ripples);

                            setTimeOut(() => {
                                ripples.remove()
                            },1000);
                        })
                    })
                </script>
        </body>
    </html>