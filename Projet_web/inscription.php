<!DOCTYPE html>
    <html>
        <head>
            <title>Index</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <form action="vérif_inscription.php" enctype='multipart/form-data' method="post">
                <input type="text" name="nom" placeholder="NOM">
                <input type="text" name="prenom" placeholder="PRENOM">
                <input type="file" name="avatar" placeholder="Photo de Profil">
                <input type="email" name="email" placeholder="Adresse mail" />
                <input type="number" name="budget" placeholder="Budget" />
                <input type="password" name="password" placeholder="Mot de passe" />
                <input type="password" name="password2" placeholder="Confirmation Mot de passe" />
                <button type="submit">Envoyer</button>
            </form>
        </body>
    </html>