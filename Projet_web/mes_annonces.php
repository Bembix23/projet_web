<?php
    include('config.php');
    session_start();

    if (!isset($_SESSION["IS_CONNECTED"])) {
        header("Location: index.php");
        exit;
    }

    //Récupère les informations des annonces de l'utilisateur
    $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE id_annonceur = '{$_SESSION["id"]}'");
    $query->execute();

?>


<!DOCTYPE html>
    <html>
        <head>
            <title>Mes offres</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <div class="ma">
                <img src="logo.png">
                <!-- liens vers les annonces -->
                <?php while($infos = $query->fetch()) {
                        echo "<a class='a' href='modif_annonce.php?id={$infos["id"]}'>{$infos['titre']}</a>";
                    }
                ?>
                <a href="mon_profil.php" class = "a">Retour</a>
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