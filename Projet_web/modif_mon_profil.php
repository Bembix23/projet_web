<?php
    session_start();
    /*
    if (!isset($_SESSION["IS_CONNECTED"])) {
        header("Location: index.php");
        exit;
    }*/
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Page Candidat</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <h1>Bienvenue sur votre page Candidat, <?php echo $_SESSION["prenom"];?>.</h1>
            <h2>Vous voulez acceder aux paramètres de votre compte ? Vous voulez modifier vos informations ? Appuyez sur le bouton suivant !</h2>
            <h3>Ci-dessous, vous pouvez modifier le prenom d'un compte:</h3>
            <form action="modif_prenom.php" method="post">
            <input type= "text" name="new_prenom" placeholder="Nouveau Prenom" />
            <br>
            <input type= "password" name="password" placeholder="Mot de passe" />
            <button type= "submit"> Modifier</button>
            </form>
            <br>
            <h3>Ci-dessous, vous pouvez modifier le nom d'un compte:</h3>
            <form action="modif_nom.php" method="post">
            <input type= "text" name="new_nom" placeholder="Nouveau Nom" />
            <br>
            <input type= "password" name="password" placeholder="Mot de passe" />
            <button type= "submit"> Modifier</button>
            </form>
            <br>
            <h3>Ci-dessous, vous pouvez modifier le mot de passe de votre compte:</h3>
            <form action="modif_mdp.php" method="post">
            <input type= "text" name="email" placeholder="Votre adresse mail" />
            <br>
            <input type= "password" name="password" placeholder="Ancien Mot de Passe" />
            <br>
            <input type= "password" name="new_password" placeholder="Nouveau Mot de Passe" />
            <button type= "submit"> Modifier</button>
            </form>
            <br>
            <h3>Ci-dessous, vous pouvez modifier l'adresse mail de votre compte':</h3>
            <form action="modif_mail.php" method="post">
            <input type= "text" name="new_email" placeholder="Nouveau Mail" />
            <br>
            <input type= "password" name="password" placeholder="Mot de passe" />
            <button type= "submit"> Modifier</button>
            </form>
            <br>
            <h3>Ci-dessous, vous pouvez modifier le budget de votre compte':</h3>
            <form action="modif_budget.php" method="post">
            <input type= "text" name="new_budget" placeholder="Nouveau Budget" />
            <br>
            <input type= "password" name="password" placeholder="Mot de passe" />
            <button type= "submit"> Modifier</button>
            </form>
            <br>
            <h3>Ci-dessous, vous pouvez modifier votre photo de profil:</h3>
            <form action="modif_photo.php" enctype='multipart/form-data' method="post">
            <input type="file" name="avatar" placeholder="Photo de Profil">
            <button type= "submit"> Modifier</button>
            </form>
            <br>
            <a href = "deconnexion.php">Deconnexion</a>
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