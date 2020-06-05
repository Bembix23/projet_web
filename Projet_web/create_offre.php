<!DOCTYPE html>
    <html>
        <head>
            <title>Index</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
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
        </body>
    </html>