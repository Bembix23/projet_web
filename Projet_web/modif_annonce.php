<?php
    include('config.php');
    session_start();

    if (!isset($_SESSION["IS_CONNECTED"])) {
        header("Location: index.php");
        exit;
    }
    
    $query = $pdo->prepare("SELECT * FROM ProjetWeb.annonce WHERE id_annonceur = '{$_SESSION["id"]}' AND id = '{$_GET["id"]}'");
    $query->execute();

    $filetitre = "modif_titre_annonce.php?id=" . $_GET["id"];
    $filedescription = "modif_description_annonce.php?id=" . $_GET["id"];
    $fileimage = "modif_image_annonce.php?id=" . $_GET["id"];
    $filedelete = "delete_annonce.php?id=" . $_GET["id"];

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
                    $str_titre = strtolower($infos["titre"]);

                    $fileDestination = "./annonces/".$str_titre."/".$str_titre.".png";

                    echo "<h1>{$infos['titre']}</h1><br>";
                    echo "<img src='{$fileDestination}'<br>";
                    echo "{$infos['description']}<br>";
                }
            ?>

            <h3>Ci-dessous, vous pouvez modifier le titre de l'annonce:</h3>
            <?php echo "<form action=$filetitre method='post'>"?>
            <input type= "text" name="new_titre" placeholder="Nouveau Titre" />
            <button type= "submit"> Modifier</button>
            </form>
            <br>
            <h3>Ci-dessous, vous pouvez modifier la description de l'annonce:</h3>
            <?php echo "<form action=$filedescription method='post'>"?>
            <input type= "text" name="new_description" placeholder="Nouvelle description" />
            <button type= "submit"> Modifier</button>
            </form>
            <br>
            <h3>Ci-dessous, vous pouvez modifier la photo de l'annonce:</h3>
            <?php echo "<form action=$fileimage  enctype='multipart/form-data' method='post'>"?>
            <input type= "file" name="new_image" placeholder="Nouvelle Photo" />
            <button type= "submit"> Modifier</button>
            </form>
            <br>
            <?php echo "<a href=$filedelete >Supprimer l'offre</a>"?>
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