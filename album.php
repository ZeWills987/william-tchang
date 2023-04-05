<?php
require 'config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:/');
    die();
} else {
?>
    <div class="album">
        <div class="album-col">
            <?php for ($i = 0; $i < 5; $i += 1) { ?>
                <div class="album-row">
                    <div class="album-img">
                        <img src="/data/img/Afro Stress (Crose Remix).jpg" alt="Afro Stress">
                    </div>
                    <div class="album-content">
                        <div class="album-header">
                            <div class="album-play">
                                <i class="fa fa-play" aria-hidden="true"></i>
                            </div>
                            <div class="album-title">
                                <h4>Le nice</h4>
                                <p>Crose</p>
                            </div>
                            <div class="album-date">
                                <p>•</p>
                                <p>il y'a 2 minutes</p>
                            </div>
                        </div>
                        <div class="album-zik">
                            <div class="wave">
                                <div id="waveform"></div>
                            </div>
                        </div>
                        <div class="album-footer">
                            <div class="albumAction">
                                <button>
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <p>10</p>
                                </button>
                                <button>
                                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                    <p>50</p>
                                </button>
                                <button>
                                    <i class="fa fa-share" aria-hidden="true"></i>
                                    <p>0</p>
                                </button>
                                <button>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="album-footer-right">
                                <div class="ecoute">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                    <p>10</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>