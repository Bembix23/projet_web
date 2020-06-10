<!DOCTYPE html>
    <html>
        <head>
            <title>Défault réservation</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <div class="pauvre">
                <img src="logo.png">
                <p>Tous les champs sont obligatoires.</p> 
                <a href="home.php" class = "a">Home</a>
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