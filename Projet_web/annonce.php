<?php
    include('config.php');
    session_start();

    //Requête qui récupère les inforamations lié à l'annonce choisi
    $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE id = {$_GET['id']}");
    $query->execute();
    $infos = $query->fetch();

    $lat = (float)$infos["latitude"];
    $lon = (float)$infos["longitude"];

    
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Mes offres</title>
            <link rel="stylesheet" href="style.css" type="text/css">
            <script src="https://maps.google.com/maps/api/js?key=AIzaSyAR72-2cHpkYIr7Mklz1jPeN7ISheBqtQE" type="text/javascript"></script>
            <script async type="text/javascript">
            // On initialise la latitude et la longitude de Paris (centre de la carte)
                var lat = <?php echo $lat ?>;
                var lon = <?php echo $lon ?>;
                var map = null;
                // Fonction d'initialisation de la carte
                function initMap() {
                    // Créer l'objet "map" et l'insèrer dans l'élément HTML qui a l'ID "map"
                    map = new google.maps.Map(document.getElementById("map"), {
                        // Nous plaçons le centre de la carte avec les coordonnées ci-dessus
                        center: new google.maps.LatLng(lat, lon), 
                        // Nous définissons le zoom par défaut
                        zoom: 13, 
                        // Nous définissons le type de carte (ici carte routière)
                        mapTypeId: google.maps.MapTypeId.ROADMAP, 
                        // Nous activons les options de contrôle de la carte (plan, satellite...)
                        mapTypeControl: true,
                        // Nous désactivons la roulette de souris
                        scrollwheel: false, 
                        mapTypeControlOptions: {
                            // Cette option sert à définir comment les options se placent
                            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR 
                        },
                        // Activation des options de navigation dans la carte (zoom...)
                        navigationControl: true, 
                        navigationControlOptions: {
                            // Comment ces options doivent-elles s'afficher
                            style: google.maps.NavigationControlStyle.ZOOM_PAN 
                        }
                    });
                }
                window.onload = function(){
                    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
                    initMap(); 
                };

                // Nous initialisons une liste de marqueurs
                var villes = {
                    "Paris":{"lat": 48.852969,"lon": 2.349903},
                };
                function initMap() {
                    map = new google.maps.Map(document.getElementById("map"), {
                        center: new google.maps.LatLng(lat, lon),
                        zoom: 13,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        mapTypeControl: true,
                        scrollwheel: false,
                        mapTypeControlOptions: {
                            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                        },
                        navigationControl: true,
                        navigationControlOptions: {
                            style: google.maps.NavigationControlStyle.ZOOM_PAN
                        }
                    });
                    // Nous parcourons la liste des villes
                    for(ville in villes){
                        // Nous ajoutons un marqueur
                        var marker = new google.maps.Marker({
                            // Nous définissons sa position (syntaxe json)
                            position: {lat: lat, lng: lon},
                            // Nous définissons à quelle carte il est ajouté
                            map: map
                        });
                    }
                }
            </script>
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
                                echo '<a href="connexion.php" class = "a">Connexion</a>
                                <a href="inscription.php" class = "a">Inscription</a><br>';
                            }
                        ?>
                </div>
                <div class=info_AA>
                    <p>Prix à la nuit par personne : <?php echo $infos["prix_nuit"] ?>
                    <p>Nombre de place maximum : <?php echo $infos["nb_place"] ?><br>
                    <p class="lastone">Adresse : <?php echo $infos["adresse"] . " " . $infos["ville"] ?><br>


                    <div id="map"></div>
                </div>
                <div class="action">
                    <a class="a" href="recherche.php">Retour</a>
                    <script type="text/javascript">
                            const buttons = document.querySelectorAll('a');
                            buttons.forEach(btn => {
                                btn.addEventListener('click', function(e) {

                                    let x = e.clientX - e.target.offsetLeft;
                                    let y = e.clientY - e.target.offsetTop;

                                    let ripples = document.createElement('span');
                                    ripples.setAttribute("class", "spaN");
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

                
                    
                