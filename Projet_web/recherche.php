<?php
    include('config.php');
    session_start();

    if (!empty($_POST["ville"])){
        $_SESSION["ville"] = $_POST["ville"];
    } else {
        $_SESSION["ville"] = NULL;
    }

    if (!empty($_POST["nb_voyageur"])){
        $_SESSION["nb_voyageur"] = $_POST["nb_voyageur"];
    } else {
        $_SESSION["nb_voyageur"] = NULL;
    }

    if (!empty($_POST["prix_max"])){
        $_SESSION["prix_max"] = $_POST["prix_max"];
    } else {
        $_SESSION["prix_max"] = NULL;
    }

    if (!empty($_POST["Date_arrivé"]) && !empty($_POST["Date_départ"])){
        $_SESSION["Date_arrivé"] = $_POST["Date_arrivé"];
        $_SESSION["Date_départ"] = $_POST["Date_départ"];
        $test=date('Y-m-d',strtotime($_SESSION["Date_arrivé"]));
        $test2=date('Y-m-d',strtotime($_SESSION["Date_départ"]));
    } else {
        $_SESSION["Date_arrivé"] = NULL;
        $_SESSION["Date_départ"] = NULL;
    }
    
    
    /*if (!empty($_SESSION["ville"]) && !empty($_SESSION["nb_voyageur"]) && !empty($_SESSION["prix_max"]) && !empty($_SESSION["Date_arrivé"]) && !empty($_SESSION["Date_départ"])) {
        $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND nb_place = {$_SESSION["nb_voyageur"]} AND prix_nuit <= {$_SESSION["prix_max"]}");
        $query->execute();
    }*/
    
    if (isset($_SESSION["id"])) {
        if (!empty($_SESSION["ville"]) && !empty($_SESSION["nb_voyageur"]) && !empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND nb_place = {$_SESSION["nb_voyageur"]} AND prix_nuit <= {$_SESSION["prix_max"]} AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
    
        else if (!empty($_SESSION["ville"]) && !empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND prix_nuit <= {$_SESSION["prix_max"]} AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
    
        else if (!empty($_SESSION["nb_voyageur"]) && !empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE nb_place = {$_SESSION["nb_voyageur"]} AND prix_nuit <= {$_SESSION["prix_max"]} AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
    
        else if (!empty($_SESSION["ville"]) && !empty($_SESSION["nb_voyageur"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND nb_place = {$_SESSION["nb_voyageur"]} AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
        else if (!empty($_SESSION["ville"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
        else if (!empty($_SESSION["nb_voyageur"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE nb_place = '{$_SESSION["nb_voyageur"]}' AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
        else if (!empty($_SESSION["prix_max"])) {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE prix_nuit <= '{$_SESSION["prix_max"]}' AND id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
        else {
            $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE id_annonceur != '{$_SESSION["id"]}'");
            $query->execute();
        }
    }

    else {

    if (!empty($_SESSION["ville"]) && !empty($_SESSION["nb_voyageur"]) && !empty($_SESSION["prix_max"])) {
        $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND nb_place = {$_SESSION["nb_voyageur"]} AND prix_nuit <= {$_SESSION["prix_max"]}");
        $query->execute();
    }

    else if (!empty($_SESSION["ville"]) && !empty($_SESSION["prix_max"])) {
        $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND prix_nuit <= {$_SESSION["prix_max"]}");
        $query->execute();
    }

    else if (!empty($_SESSION["nb_voyageur"]) && !empty($_SESSION["prix_max"])) {
        $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE nb_place = {$_SESSION["nb_voyageur"]} AND prix_nuit <= {$_SESSION["prix_max"]}");
        $query->execute();
    }

    else if (!empty($_SESSION["ville"]) && !empty($_SESSION["nb_voyageur"])) {
        $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}' AND nb_place = {$_SESSION["nb_voyageur"]}");
        $query->execute();
    }
    else if (!empty($_SESSION["ville"])) {
        $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE ville LIKE '{$_SESSION["ville"]}'");
        $query->execute();
    }
    else if (!empty($_SESSION["nb_voyageur"])) {
        $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE nb_place = '{$_SESSION["nb_voyageur"]}'");
        $query->execute();
    }
    else if (!empty($_SESSION["prix_max"])) {
        $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE prix_nuit <= '{$_SESSION["prix_max"]}'");
        $query->execute();
    }
    else {
        $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce");
        $query->execute();
    }
    }

    /*$debut_jour = date('d',strtotime($_SESSION["Date_départ"]));
    $debut_mois = date('m',strtotime($_SESSION["Date_départ"]));
    $debut_annee = date('Y',strtotime($_SESSION["Date_départ"]));

    $fin_jour = date('d',strtotime($_SESSION["Date_arrivé"]));
    $fin_mois = date('m',strtotime($_SESSION["Date_arrivé"]));
    $fin_annee = date('Y',strtotime($_SESSION["Date_arrivé"]));

    $debut_date = mktime(0, 0, 0, $debut_mois, $debut_jour, $debut_annee);
    $fin_date = mktime(0, 0, 0, $fin_mois, $fin_jour, $fin_annee);

    for($i = $debut_date; $i <= $fin_date; $i+=86400)
    {
    echo date('Y-m-d',$i)."<br />" ;
    }

    die;*/

?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Les offres</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <img src="logo.png">
                <?php if (isset($_SESSION["Date_arrivé"]) && isset($_SESSION["Date_départ"])) {
                    $x = array();
                    while($infos = $query->fetch()) {

                        $query1 = $pdo->prepare("SELECT * FROM ProjetWeb.date_de_réservation
                        WHERE id_chambre = {$infos['id']}
                        AND date_réservation BETWEEN '{$test}' AND '{$test2}'");
                        $query1->execute();
                        $infos1 = $query1->fetch();

                        if (empty($infos1)) {

                            $str_titre = strtolower($infos["titre"]);

                            $fileDestination = "./annonces/".$str_titre."/".$str_titre.".png";
                            
                            
                            echo '<div class="container">';
                                echo '<div class="card">';
                                    echo '<div class="imgBx>';
                                    ?><img class="img" <?php echo "src= {$fileDestination}"?>> <?php
                                    echo '</div>';
                                    echo '<div class="contentBx">';
                                        echo "<h2>{$infos['titre']}</h2><br>";
                                        echo '<div class="size">';
                                            echo "<h3>{$infos['description']}</h3>";
                                            echo "<a class='button' href='annonce.php?id={$infos["id"]}'>Destination</a>";
                                        echo '</div>';
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
                                    echo '<div class="imgBx>';
                                    ?><img class="img" <?php echo "src= {$fileDestination}"?>> <?php
                                    echo '</div>';
                                    echo '<div class="contentBx">';
                                        echo "<h2>{$infos['titre']}</h2><br>";
                                        echo '<div class="size">';
                                            echo "<h3>{$infos['description']}</h3>";
                                            echo "<a class='button' href='annonce.php?id={$infos["id"]}'>Destination</a>";
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            }
                        }
                    ?>

                <a href="index.php" class = "link_home">Retour</a>'
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