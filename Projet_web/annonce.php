<?php
    include('config.php');
    session_start();

    //Requête qui récupère les inforamations lié à l'annonce choisi
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
            <div class="AAA">
                <div class="logo_A">
                    <img src="logo.png">
                </div>
                <div class="descrip_1">
                    <?php
                        //Infos sur l'annonce
                            echo "<div>";
                            $str_titre = strtolower($infos["titre"]);

                            $fileDestination = "./annonces/".$str_titre."/".$str_titre.".png";

                            echo "<h2 class='titre_AA'>{$infos['titre']}</h2><br>";
                            echo "<img class='imgAA' src={$fileDestination}><br>";

                            echo "{$infos['description']}";
                            echo "</div>";

                        ?>
                </div>
                <div class="reserv_C">
                    <?php if (!empty($_SESSION["IS_CONNECTED"])) {
                        //Formulaire de réservation (l'utilisateur doit être connecté)
                            echo "<form action='réservation.php?id={$infos["id"]}' method='post'>" ?>
                            <input type="number" name="nombre_locataire" placeholder="Nombre de locataire" />
                            <input type="date" name="Date_arrivé" placeholder="Date d'arrivé" />
                            <input type="date" name="Date_départ" placeholder="Date de départ" />
                            <button type="submit">Envoyer</button>
                        </form>
                </div>
                <div class="reserv_D">
                    <?php }
                        //Si l'utilisateur n'est pas connecté, affiche les boutons connexion et inscription
                            else {
                                echo "Vous devez être connecté pour réservé un bien";
                                echo '<a href="connexion.php" class = "link_home">Connexion</a>
                                <a href="inscription.php" class = "link_home">Inscription</a><br>';
                            }
                        ?>
                </div>
                <div class=info_AA>
                    <p>Prix à la nuit par personne : <?php echo $infos["prix_nuit"] ?>
                    <p>Nombre de place maximum : <?php echo $infos["nb_place"] ?><br>
                    <div class="map" id="map"></div>
                    <script src="app.js" type="application/js"></script>
                    <a href="recherche.php">Retour</a>
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
                </div>
            
                   
        
                   
            </div>
            
        </body>
    </html>

                
                    
                