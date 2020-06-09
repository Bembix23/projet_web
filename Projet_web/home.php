<?php

    include_once('config.php'); 

    session_start();
    if (!isset($_SESSION["IS_CONNECTED"])) {
        header("Location: index.php");
        exit;
    }
    
    $str = strtolower($_SESSION["prenom"])."_".strtolower($_SESSION["nom"]);

    $fileDestination = "./profils/".$str."/".$str.".png";

    
?>


<!DOCTYPE html>
    <html>
        <head>
            <title>Firebee'n B</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
        <div class="index">
            <div class="logo">
                <img src="logo.png"><h1>Firebee'n B</h1>
            </div>
            <div class="votete">
                <?php echo "<img class='vous' src='{$fileDestination}' widht=50px>";?>
            </div>
           
            <div class="rechercheH">
                <form action="recherche.php" method="post">
                    <h2 class="ou">Ou voulez vous aller ?</h2>
                    <input type="text" name="ville" placeholder="Ville" />
                    <input type="number" name="nb_voyageur" placeholder="Nombre de voyageur" />
                    <input type="date" name="Date_arrivé" placeholder="Date d'arrivé" />
                    <input type="date" name="Date_départ" placeholder="Date de départ" />
                    <input type="number" name="prix_max" placeholder="Budget maximum" />
                    <button type="submit">Envoyer</button>
                </form>
            </div>
            <div class="action">
                <a href="create_offre.php" >Proposer une offre d'hébergement</a><br>
                <a href="mon_profil.php" >Acceder à mon compte</a><br>
                <a href="nous.php" >Qui sommes nous ?</a><br>
                <a href="deconnexion.php">Se déconnecter</a><br>
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
            
           
        <div>
        </body>
    </html>