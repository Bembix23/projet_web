<!DOCTYPE html>
    <html>
        <head>
        <meta name="viewport" content ="width=device-width, initial-scale=1">
            <title>Qui sommes nous ?</title> 
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <img class="logo" src="logo.png">
            <div class="pres">
                <h1 class="h1nous">Qui sommes nous ?</h1>
                <h2 class="qui">Nous sommes 3 étudiants en Bachelor 1 en informatique à Ynov Bordeaux Campus.</h2>
                <h2 class="qui">Nous avons créé ce site dans le cadre d'un projet WEB, nous avons donc utilisé les technologies HTML & CSS, JAVASCRIPT, PHP, et SQL.</h2>
            </div>
            <div class="box">
                <div class="ImageBox">
                    <img class="us" src="gauthierm.png" alt="Gauthier Michon">
                </div>
                <div class="infoBox">
                    <h3 class="nous">Gauthier Michon</h3>
                </div>
            </div>
            <div class="box">
                <div class="ImageBox">
                    <img class="us" src="benjaminc.png" alt="Benjamin Chancerel">
                </div>
                <div class="infoBox">
                    <h3 class="nous">Benjamin Chancerel</h3>
                </div>
            </div>
            <div class="box">
                <div class="ImageBox">
                    <img class="us" src="julesd.png" alt="Jules Dupuis">
                </div>
                <div class="infoBox">
                    <h3 class="nous">Jules Dupuis</h3>
                </div>
            </div> 
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