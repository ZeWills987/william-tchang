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
                <div class="linkedin">
                    <a href="https://www.linkedin.com/in/william-tchang-429103291/">
                        <img src="/data/img/icon/linkedin.png" alt="Linkedin">
                    </a>
                </div>
                <div class="github">
                    <a href="https://github.com/ZeWills987">
                        <img src="/data/img/icon/github.png" alt="GitHub">
                    </a>
                </div>
                <div class="cv">
                    <a href="/data/pdf/CV_TCHANG_WIlliam.pdf" download>
                        <img src="/data/img/icon/cv.png" alt="CV">
                    </a>
                </div>
            </div>
        </div>
        <div class="middle">
            <nav>
                <ul>
                    <li>
                        <a href="#h">
                            <div class="icon">
                                <img src="/data/img/icon/home.png" alt="Home">
                            </div>
                            <div class="desc">
                                <p>Accueil</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#a">
                            <div class="icon">
                                <img src="/data/img/icon/utilisateur.png" alt="Home">
                            </div>
                            <div class="desc">
                                <p>A Propos</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#p">
                            <div class="icon">
                                <img src="/data/img/icon/afficher-le-bouton-des-applications.png" alt="Home">
                            </div>
                            <div class="desc">
                                <p>Portfolio</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#c">
                            <div class="icon">
                                <img src="/data/img/icon/letter.png" alt="Contact">
                            </div>
                            <div class="desc">
                                <p>Contact</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="bottom">
            <p>© 2023 par <a href="https://william-tchang.fr">William Tchang</a></p>
        </div>
    </header>
    <main>
        <div class="home" id="h">
            <div class="top">
                <div class="nothing"></div>
                <div class="dwn-cv">
                    <a href="/data/pdf/CV_TCHANG_WIlliam.pdf">Télécharger CV</a>
                </div>
            </div>
            <div class="presentation">
                <div class="block">
                    <div class="name">
                        <h1>
                            <strong>William TCHANG</strong>
                        </h1>
                    </div>
                    <div class="desc">
                        <p>Je suis <span class="typed" data-period="2000" data-typed-items='["Étudiant","Autonome", "Motivé", "Polyvalent", "Passionné", "Sociable", "Moi"]'></span>
                            <span class="typed-cursor typed-cursor--blink" aria-hidden="true">|</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="aboutme" id="a">
            <div class="top">
                <div class="title">
                    <h1>À Propos</h1>
                </div>
                <div class="dwn-cv">
                    <a href="/data/pdf/CV_TCHANG_WIlliam.pdf">Télécharger CV</a>
                </div>
            </div>
            <div class="main">
                <div class="block">
                    <div class="photo">
                        <img src="/data/img/william_tchang.jpg" alt="William Tchang">
                    </div>
                    <div class="desc">
                        <p><strong>Hello World!</strong></p>
                        <p>En tant qu'étudiant en deuxième année de BUT Informatique, je me passionne pour le sport,
                            notamment le volley-ball, où je valorise particulièrement le <strong>travail
                                d'équipe</strong>. Cette passion
                            s'est naturellement étendue à la conception et au développement d'applications web au cours
                            de mes moments de liberté. Cette activité a joué un rôle essentiel dans le renforcement de
                            mon sens de l'<strong>autonomie</strong>. En effet, mon immersion dans le domaine du web
                            remonte à trois ans,
                            une période marquée par la <strong>motivation de concrétiser une idée personnelle
                                novatrice</strong>.
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="portfolio" id="p">
            <div class="top">
                <div class="title">
                    <h1>Protfolio</h1>
                </div>
                <div class="dwn-cv">
                    <a href="/data/pdf/CV_TCHANG_WIlliam.pdf">Télécharger CV</a>
                </div>
            </div>
            <div class="main">
                <div class="desc">
                    <p>Au cours de mes deux années au sein de l'IUT de Bordeaux et lors de mes temps libres, j'ai eu
                        l'occasion
                        de mener à bien plusieurs projets significatifs. Certains d'entre eux sont répertoriés sur mon
                        profil
                        <strong>Github</strong>,
                        tandis que d'autres demeurent accessibles dans les différents répertoires associés à mon compte.
                        Ces projets ont été l'occasion pour moi de mettre en pratique mes compétences en informatique et
                        de développer une expertise dans la conception et la réalisation de solutions techniques. Je
                        vous invite à explorer mon profil Github pour découvrir l'étendue de mes réalisations.
                    </p>
                </div>
                <div class="category">
                    <ul>
                        <li data-filter="php">PHP</li>
                        <li data-filter="js">JS</li>
                        <li data-filter="html">HTML/CSS</li>
                        <li data-filter="java">Java</li>
                        <li data-filter="c#">C#</li>
                    </ul>
                </div>
                <div class=" all-projects">
                    <?php require 'project.php'; ?>
                </div>
            </div>
        </div>
        <div class="contact" id="c">
            <div class="top">
                <div class="title">
                    <h1>Contact</h1>
                </div>
                <div class="dwn-cv">
                    <a href="/data/pdf/CV_TCHANG_WIlliam.pdf">Télécharger CV</a>
                </div>
            </div>
            <div class="main">
                <div class="desc">
                    <p>Pour toute information supplémentaire, je vous invite à utiliser les coordonnées suivantes. Je
                        reste disponible à tout moment par e-mail et téléphone.</p>
                </div>
                <div class="row-contact">
                    <div class="details">
                        <div class="row-details">
                            <div class="icon">
                                <img src="/data/img/icon/location.png" alt="Localisation">
                            </div>
                            <div class="value">
                                <h1>Ville :</h1>
                                <p>Pessac</p>
                            </div>
                        </div>
                        <div class="row-details">
                            <div class="icon">
                                <img src="/data/img/icon/letter.png" alt="Mail">
                            </div>
                            <div class="value">
                                <h1>Email :</h1>
                                <p>william.tchang.pro@gmail.com</p>
                            </div>
                        </div>
                        <div class="row-details">
                            <div class="icon">
                                <img src="/data/img/icon/smartphone-call.png" alt="Mobile">
                            </div>
                            <div class="value">
                                <h1>Mobile : </h1>
                                <p>07.89.08.68.35</p>
                            </div>
                        </div>
                        <div class="row-details">
                            <div class="icon">
                                <img src="/data/img/icon/linkedin.png" alt="Linkedin">
                            </div>
                            <div class="value">
                                <h1>Linkedin :</h1>
                                <p>william-tchang-429103291</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="/data/js/script.js"></script>
</body>

</html>