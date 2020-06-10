<?php
    include('config.php');
    session_start();

    if (!isset($_SESSION["IS_CONNECTED"])) {
        header("Location: index.php");
        exit;
    }

    $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE id_annonceur = '{$_SESSION["id"]}'");
    $query->execute();

?>


<!DOCTYPE html>
    <html>
        <head>
            <title>Mon Profil</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>

        <body>
            <div class="profil1">
                <div class="logo_profil">
                    <h1><img src="logo.png"></h1>
                </div>
                <div class="nav_profile">
                    <a href="home.php" class="a">home</a>
                    <a href="modif_mon_profil.php" class="a">Modification Profil</a>
                    <a href="mes_annonces.php" class="a">Gérer mes annonces</a>
                </div>
                <div class="annonces_profile">
                    <h2> Mes annonces : </h2><br>
                    <!-- Affiche les annonces de l'utilisateur -->
                    <?php while($infos = $query->fetch()) {
                        $str_titre = strtolower($infos["titre"]);
                        $fileDestination = "./annonces/".$str_titre."/".$str_titre.".png";

                        echo "<p>{$infos['titre']}</p><br>";

                        echo "<img class='monq' src={$fileDestination}><br>";
                        }
                    ?>
                </div>
                
            
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
            
        </body>
    </html>