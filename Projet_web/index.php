<?php

    include_once('config.php');

    session_start();
    if (isset($_SESSION["IS_CONNECTED"])) {
        header("Location: home.php");
        exit;
    }

?>
    <!DOCTYPE html>
    <html lang=fr>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
        <body>
            <div class="index">
                <div class="logo">
                    <img src="logo.png"><h1>Firebee'n B</h1>
                </div>
                <div class="nav">
                    <a href="connexion.php" class = "link_home">Connexion</a>
                    <a href="inscription.php" class = "link_home">Inscription</a><br>
                    <a href="nous.php" class = "link_home">Qui sommes nous ?</a>
                    
                </div>    
                <div class="recherche">  
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
            </div> 
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