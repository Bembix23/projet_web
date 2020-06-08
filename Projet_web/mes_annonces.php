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
            <title>Mes offres</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <img src="logo.png">
            <?php while($infos = $query->fetch()) {
                    echo "<a class='button' href='modif_annonce.php?id={$infos["id"]}'>{$infos['titre']}</a>";
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