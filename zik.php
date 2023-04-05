<?php
require 'config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:/');
    die();
} else {
?>
    <div class="zik">
        <div class="zik-col">
            <?php for ($i = 0; $i < 6; $i += 1) { ?>
                <div class="zik-row">
                    <div class="zik-img">
                        <img src="/data/img/Afro Stress (Crose Remix).jpg" alt="Afro Stress">
                    </div>
                    <div class="zik-content">
                        <div class="zik-header">
                            <div class="zik-play">
                                <i class="fa fa-play" aria-hidden="true"></i>
                            </div>
                            <div class="zik-title">
                                <h4>Afro Stress (Crose Remix)</h4>
                                <p>Crose</p>
                            </div>
                            <div class="zik-date">
                                <p>•</p>
                                <p>il y'a 2 ans</p>
                            </div>
                        </div>
                        <div class="zik-wave">
                            <div class="wave">
                                <div id="waveform"></div>
                            </div>
                        </div>
                        <div class="zik-footer">
                            <div class="zikAction">
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
                            <div class="zik-footer-right">
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