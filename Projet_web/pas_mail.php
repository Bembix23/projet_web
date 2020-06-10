<!DOCTYPE html>
    <html>
        <head>
            <title>Réservation OK</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <div class="pauvre">
                <img src="logo.png">
                <p>Votre réservation a été effectué, mais l'envoi de mail a échoué.</p> 
                <a href="home.php" class = "a">Home</a>
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