<?php require('donne.php'); ?>
<?php for ($i = 0; $i < count($title); $i++) { ?>
    <div class="project">
        <div class="img">
            <img src="/data/img/projets/<?= $images[$i] ?>" alt="<?= $title[$i] ?>">
        </div>
        <div class="contenu">
            <h1><?= $title[$i] ?></h1>
            <p><?= $description[$i] ?></p>
            <?php if (!empty($links[$i])) { ?>
                <a href="<?= $links[$i] ?>"><img src="/data/img/icon/link.png" alt="Liens"></a>
            <?php } ?>
            <?php if (!empty($retext[$i])) { ?>
                <a href="<?= $links[$i] ?>"><img src="/data/img/icon/link.png" alt="Liens"></a>
            <?php } ?>
            <ul>
                <?php for ($y = 0; $y < count($skills[$i]); $y++) { ?>
                    <li><?= $skills[$i][$y] ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>