<?php
require 'model/data.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/data/css/style.css">
    <link rel="stylesheet" href="/data/css/aniamtion.css">
    <link rel="icon" type="image/x-icon" href="data/img/william_tchang_logo.png">

    <title>William Tchang | Portfolio</title>
</head>

<body>
    <header>
        <div class="top">
            <div class="logo">
                <img src="/data/img/william_tchang_logo.png" alt="Logo">
            </div>
            <div class="name">
                <h2>William Tchang</h2>
            </div>
            <div class="social">
            </div>
        </div>
        <div class="middle">

        </div>
        <div class="bottom">
            <p>© 2023 par <a href="https://william-tchang.fr">William Tchang</a></p>
        </div>
    </header>
    <main>
        <div class="portfolio" id="p">
            <div class="top">
                <div class="title">
                    <h1>Amdin Protfolio</h1>
                </div>
                <div class="dwn-cv">
                    <a href="/data/pdf/CV_TCHANG_WIlliam.pdf">Télécharger CV</a>
                </div>
            </div>
            <div class="main">
                <div class="desc">
                    <p>Ajouter des projets</p>
                </div>
                <div class="category">
                    <ul>
                        <?php $skills = get_all_skills();
                        foreach ($skills as $skill) { ?>
                            <li data-filter="<?= $skill['nom'] ?>"><?= $skill['nom'] ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class=" all-projects">
                    <div class="project">
                        <div class="img">
                            <input type="text" name="image" id="image">
                        </div>
                        <div class="contenu">
                            <input type="text" name="title" id="title">
                            <input type="text" name="desc" id="desc">
                            <input type="text" name="link" id="link">
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="/data/js/script.js"></script>
</body>

</html>