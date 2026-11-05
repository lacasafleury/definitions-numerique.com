<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
<meta name="theme-color" content="#47657F">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avatar Display</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            /* Prend toute la hauteur de la fenêtre */
            display: flex;
            justify-content: center;
            align-items: flex-end;
            /* Aligne le contenu en bas */
            background: url("./static/city-night.jpg") fixed 0 / cover;
            /* Fond de la page */
        }

        main {
            width: 100%;
            height: 529px;
            /* Hauteur fixe pour le main */
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
            /* Espace en bas */
        }

        .path {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            margin: 100px auto;
            position: relative;
            display: flex;
            border: 1px solid #b4a078;
        }

        .logo {
            width: 52px;
            margin: auto;
            background: #FFF;
        }

        .avatar {
            width: 50px;
            position: absolute;
            top: 124px;
            left: 124px;
            animation: circular-smooth-spin 7.5s infinite linear;
            animation-play-state: running;
        }

        .avatar>span {
            font-weight: 500;
            position: absolute;
            white-space: nowrap;
            top: -50%;
            left: 50%;
            padding: 3px 12px;
            opacity: 0;
            transform: scale(0);
            transition: opacity, transform .8s;
            transform-origin: 0 bottom;
        }

        .avatar>img {
            width: inherit;
            border-radius: 50%;
            overflow: hidden;
        }

        .path:hover .avatar {
            animation-play-state: paused;
        }

        .path:hover .avatar>span {
            opacity: 1;
            transform: scale(1);
            transition: opacity, transform .8s;
        }

        .avatar:nth-of-type(2) {
            animation-delay: -1.3s;
        }

        .avatar:nth-of-type(3) {
            animation-delay: -2.6s;
        }

        .avatar:nth-of-type(4) {
            animation-delay: -3.9s;
        }

        .avatar:nth-of-type(5) {
            animation-delay: -5.2s;
        }

        .avatar:nth-of-type(6) {
            animation-delay: -6.5s;
            /* Ajustez le délai pour le nouvel avatar */
        }

        .avatar:nth-of-type(7) {
            animation-delay: -7.8s;
            /* Ajustez le délai pour le nouvel avatar */
        }

        @keyframes circular-smooth-spin {
            from {
                transform: rotate(0turn) translateY(-124px) rotate(1turn)
            }

            to {
                opacity: 1;
                transform: rotate(1turn) translateY(-124px) rotate(0turn)
            }
        }
    </style>
</head>

<body>
    <template id="avatar-template">
        <main class="main">
            <div class="path">
                <img class="logo" src="./static/vue-logo.png" />
                <div class="avatar">
                    <span>Cédric Clérentin--Vieille</span>
                    <img src="singe.jpg" />
                </div>
                <div class="avatar">
                    <span>Valérian Cathoire</span>
                    <img src="intello.jpg" />
                </div>
                <div class="avatar">
                    <span>Blaise Brunet</span>
                    <img src="febraise.webp" />
                </div>
                <div class="avatar">
                    <span>Gael Theron</span>
                    <img src="herisson.jpg" />
                </div>
                <div class="avatar">
                    <span>Matthis Lande</span>
                    <img src="mocassin.jpg" />
                </div>
                <div class="avatar">
                    <span>Eva Filassier</span>
                    <img src="luffy.jpg" />
                </div>
                <div class="avatar">
                    <span>Fanny Leroy</span>
                    <img src="moto.jpg" /> <!-- Remplacez par le chemin de votre image -->
                </div>
            </div>
        </main>
    </template>

    <div id="avatar-container"></div>

    <script>
        // Get the template
        const template = document.getElementById('avatar-template');

        // Clone the template content
        const clone = document.importNode(template.content, true);

        // Append the cloned content to the container
        document.getElementById('avatar-container').appendChild(clone);
    </script>
</body>

</html>
