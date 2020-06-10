<!DOCTYPE html>
    <html>
        <head>
            <title>Mes offres</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <div class="pauvre">
                <div class="logo_P">
                    <img src="logo.png">
                </div>
                <div class="pauvre_I">
                    <p class="tpauvre">Vous n'avez pas assez d'argent sur votre compte</p> 
                    <a href="modif_mon_profil.php" class = "a">Modifier le Profil</a>
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
            </div>
            
        </body>
    </html>