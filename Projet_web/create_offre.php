<!DOCTYPE html>
    <html>
        <head>
            <title>Créez votre offre</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <div class="co">
                <form action="vérif_create_offre.php" enctype='multipart/form-data' method="post">
                    <input type="text" name="titre" placeholder="TITRE">
                    <input type="text" name="description" placeholder="DESCRIPTION">
                    <input type="number" name="nb_place" placeholder="Nombre de places" />
                    <input type="text" name="adresse" placeholder="Adresse" />
                    <input type="text" name="ville" placeholder="Ville" />
                    <input type="number" name="prix_nuit" placeholder="Prix pour une nuit" />
                    <input type='file' name='file' id='file'>
                    <button type="submit" name='submit' value='Upload'>Envoyer</button>
                </form>
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
            </div>
            
        </body>
    </html>