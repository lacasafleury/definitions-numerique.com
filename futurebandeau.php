<?php
// Enregistrement dans un fichier unique avec tout le code nécessaire
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation avec indicateur animé</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f9;
        }
        nav {
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 40px;
            box-shadow: 0 10px 40px rgba(159, 162, 177, .8);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }
        .nav-item {
            color: #83818c;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            margin: 0 6px;
            position: relative;
            cursor: pointer;
        }
        .nav-item:before {
            content: "";
            position: absolute;
            bottom: -6px;
            background-color: #dfe2ea;
            height: 5px;
            width: 100%;
            border-radius: 8px 8px 0 0;
            left: 0;
            transition: .3s;
        }
        .nav-item:not(.is-active):hover:before {
            bottom: 0;
        }
        .nav-item:not(.is-active):hover {
            color: #333;
        }
        .nav-indicator {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 5px;
            transition: .4s;
            border-radius: 8px 8px 0 0;
        }
        .search-bar {
            margin: 20px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .search-bar input {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
        }
        .search-bar button {
            margin-left: 10px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }
        .search-bar button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <nav>
        <div>
            <a href="#" class="nav-item is-active" data-active-color="orange" data-target="Home">Home</a>
            <a href="#" class="nav-item" data-active-color="green" data-target="About">About</a>
            <a href="#" class="nav-item" data-active-color="blue" data-target="Testimonials">Testimonials</a>
            <a href="#" class="nav-item" data-active-color="red" data-target="Blog">Blog</a>
            <a href="#" class="nav-item" data-active-color="rebeccapurple" data-target="Contact">Contact</a>
        </div>
        <span class="nav-indicator"></span>
    </nav>

    <!-- Barre de recherche -->
    <div class="search-bar">
        <form method="GET" action="">
            <input type="text" name="query" placeholder="Recherchez ici...">
            <button type="submit">Rechercher</button>
        </form>
    </div>

    <!-- Zone de contenu -->
    <div>
        <h1>Bienvenue sur notre page</h1>
        <p>Utilisez la navigation ci-dessus pour explorer les différentes sections.</p>
    </div>

    <script>
        const indicator = document.querySelector('.nav-indicator');
        const items = document.querySelectorAll('.nav-item');

        function handleIndicator(el) {
            items.forEach(item => {
                item.classList.remove('is-active');
                item.removeAttribute('style');
            });

            const elementColor = el.dataset.activeColor;

            indicator.style.width = `${el.offsetWidth}px`;
            indicator.style.backgroundColor = elementColor;
            indicator.style.left = `${el.offsetLeft}px`;

            el.classList.add('is-active');
            el.style.color = elementColor;
        }

        items.forEach(item => {
            item.addEventListener('click', e => handleIndicator(e.target));
            item.classList.contains('is-active') && handleIndicator(item);
        });
    </script>
</body>
</html>
