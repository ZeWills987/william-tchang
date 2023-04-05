<?php
session_start();
require 'config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:/');
    die();
}

// On récupere les données de l'utilisateur
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

if (isset($_GET['page'])) {
    $change = htmlspecialchars($_GET['page']);
}
?>



<!doctype html>
<html lang="fr">

<head>
    <title><?php echo $data['pseudo']; ?> | Mkzik</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Import Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="/data/css/user/header.css">
    <link rel="stylesheet" href="/data/css/style.css">
    <link rel="stylesheet" href="/data/css/user/profile.css">
    <link rel="stylesheet" href="/data/css/footer.css">
    <link rel="stylesheet" href="/data/css/formulaire.css">
    <link rel="stylesheet" href="/data/css/base/music-player.css">
    <?php if (!isset($_GET['page'])) { ?>
        <link rel="stylesheet" href="/data/css/user/untils/all.css">
    <?php } ?>
</head>
<style>
</style>

<body>
    <div class="background">
        <div class="container">
            <nav id="large-nav">
                <ul>
                    <li>
                        <a href="/">
                            <h1>Mkzik</h1>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="">Nouveautés</a></li>
                    <li>
                        <form name="fo" method="get" action="/result/">
                            <input type="search" placeholder="Rechercher">
                        </form>
                    </li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li><a id="active" href=<?php echo '/user/profile.php?id=' . $data['pseudo']; ?>><?php echo $data['pseudo']; ?></a></li>
                        <li><a href="/user/deconnexion.php">Déconnexion</a></li>
                    <?php } else { ?>
                        <li><a href="/connexion/">Se connecter</a></li>
                        <li><a href="/inscription/">S'inscrire</a></li>
                    <?php } ?>
                </ul>
            </nav>
            <div class="general-information">
                <div class="avatar">
                    <div class="couverture">
                        <div class="background">
                            <div class="pdp">
                                <img src="/data/img/user/PNM.jpg">
                                <?php if (!isset($_SESSION['user'])) {
                                    header('Location:/');
                                    die();
                                }
                                ?>
                                <button type="button" data-toggle="modal" data-target="#avatar">
                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                    Importer une image
                                </button>
                            </div>
                            <div class="info">
                                <div class="row1">
                                    <h2><?php echo $data['pseudo']; ?></h2>
                                    <!--<button type="button" data-toggle="modal" data-target="#change_password">
                                    Changer mon mot de passe
                                </button>-->
                                    <a href="edit_account/">Modifier profile</a>
                                    <i class="fa fa-cog" aria-hidden="true" style="color: white;"></i>
                                </div>
                                <div class="row2">
                                    <p><span>100</span> Ziks</p>
                                    <p><span>0</span> Abonnées</p>
                                    <p><span>0</span> Abonnements</p>
                                </div>
                                <div class="row3">
                                    <p>Tama Enana Non Nuku-Hiva || Bordeaux</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="personal-nav">
                    <ul>
                        <li><a <?php if (!isset($_GET['page'])) {
                                    echo "id=active" . PHP_EOL;
                                } ?> href=<?php echo "/user/profile.php?id=" . $data['pseudo'] . PHP_EOL; ?>>Tout</a>
                        </li>

                        <li><a <?php if (isset($_GET['page']) && $change  == 'zik') {
                                    echo "id=active" . PHP_EOL;
                                } ?> href=<?php echo "/user/profile.php?id=" . $data['pseudo'] . "&amp;page=zik" . PHP_EOL; ?>>Zik</a>
                        </li>

                        <li><a <?php if (isset($_GET['page']) && $change  == 'album') {
                                    echo "id=active" . PHP_EOL;
                                } ?> href=<?php echo "/user/profile.php?id=" . $data['pseudo'] . "&amp;page=album" . PHP_EOL; ?>>Album</a>
                        </li>

                        <li><a <?php if (isset($_GET['page']) && $change  == 'playlist') {
                                    echo "id=active" . PHP_EOL;
                                } ?> href=<?php echo "/user/profile.php?id=" . $data['pseudo'] . "&amp;page=playlist" . PHP_EOL; ?>>Playlist</a>
                        </li>
                        <li><a <?php if (isset($_GET['page']) && $change  == 'favorie') {
                                    echo "id=active" . PHP_EOL;
                                } ?> href=<?php echo "/user/profile.php?id=" . $data['pseudo'] . "&amp;page=favorie" . PHP_EOL; ?>>Préféré</a>
                        </li>
                    </ul>
                </div>
                <?php
                if (isset($_GET['page'])) {
                    switch ($change) {
                        case 'zik':
                            require 'untils/zik.php';
                            break;
                        case 'album':
                            require 'untils/album.php';
                            break;
                        case 'playlist':
                            require 'untils/playlist.php';
                            break;
                        case 'favorie':
                            require 'untils/favorite.php';
                            break;
                    }
                } else {
                    require 'untils/all.php';
                }
                ?>
            </div>
            <footer>
                <ul>
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <li><a href="/connexion/">Se connecter</a></li>
                        <li><a href="inscription/">S'inscrire</a></li>
                    <?php } ?>
                    <li><a href="/nouveaute/">Nouveauté</a></li>
                    <li><a href="/confitendalite/">Confidentialité</a></li>
                    <li><a href="/apropos/">A propos</a></li>
                    <li><a href="/cookies/">Cookies</a></li>
                    <li><a href="/mention-legales/">Mention légales</a></li>
                </ul>
                <ul>
                    <li>
                        <p>© <?php echo date("Y") . PHP_EOL; ?> par William TCHANG. Tout droit réserver.</p>
                    </li>
                </ul>
            </footer>
        </div>
        <div class="zik-player">
            <div class="track-info">
                <div class="img-track">
                    <img id="mp-img" src="/data/img/Afro Stress (Crose Remix).jpg" alt="">
                </div>
                <div class="track-desc">
                    <div class="track-title">
                        <h5 id="mp-title">PNM - F A K E L O V E</h5>
                    </div>
                    <div class="track-artist">
                        <p id="mp-user">PNM</p>
                    </div>
                </div>
            </div>
            <div class="slider">
                <p id="start-duration"><span>00:00</span></p>
                <div class="bar">
                    <input type="range" min="0" max="100" value="0" id="duration_slider" onchange="change_duration()" onmouseup="v_mouse_up()" onmousedown="v_mouse_down()">
                </div>
                <p id="end-duration"><span>00:00</span></p>
            </div>
            <div class="player">
                <div id="mp-pre" onclick="previous_song()">
                    <i class="fa fa-step-backward" aria-hidden="true"></i>
                </div>
                <div id="mp-play" onclick="justplay()">
                    <i class="fa fa-play" aria-hidden="true"></i>
                </div>
                <div id="mp-next" onclick="next_song()">
                    <i class="fa fa-step-forward" aria-hidden="true"></i>
                </div>
                <div id="repeat" onclick="autoplay_switch()">
                    <i class="fa fa-repeat" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer mon mot de passe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="layouts/change_password.php" method="POST">
                            <label for='current_password'>Mot de passe actuel</label>
                            <input type="password" id="current_password" name="current_password" class="form-control" required />
                            <br />
                            <label for='new_password'>Nouveau mot de passe</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" required />
                            <br />
                            <label for='new_password_retype'>Retapez le nouveau mot de passe</label>
                            <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required />
                            <br />
                            <button type="submit" class="btn btn-success">Sauvegarder</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer mon avatar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="layouts/change_avatar.php" method="POST" enctype="multipart/form-data">
                            <label for="avatar">Images autorisées : png, jpg, jpeg, gif - max 20Mo</label>
                            <input type="file" name="avatar_file">
                            <br />
                            <button type="submit" class="btn btn-success">Modifier</button>
                        </form>
                    </div>
                    <br />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Changer mon avatar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="layouts/change_avatar.php" method="POST" enctype="multipart/form-data">
                            <label for="avatar">Images autorisées : png, jpg, jpeg, gif - max 20Mo</label>
                            <input type="file" name="avatar_file">
                            <br />
                            <button type="submit" class="btn btn-success">Modifier</button>
                        </form>
                    </div>
                    <br />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/wavesurfer.js"></script>
</body>

</html>