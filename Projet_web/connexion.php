<!DOCTYPE html>
    <html>
        <head>
            <title>Connexion</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <div class="co">
                <img src="logo.png">
                <div class="coco">
                <!-- Formulaire de connexion -->
                    <form action="vérif_connexion.php" method="post">
                        <input type="email" name="email" placeholder="Adresse mail" />
                        <input type="password" name="password" placeholder="Mot de passe" />
                        <button type="submit">Envoyer</button>
                    </form>
                </div>
                    
                
                <a href="index.php" class = "a">Retour</a>
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