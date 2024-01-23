<?php
require 'config.php';

function get_all_sae()
{
    global $bdd;

    $sql = 'SELECT * from sae';

    $sth = $bdd->prepare($sql);
    $sth->execute();

    return $sth->fetchAll();
}

function get_all_skills()
{
    global $bdd;

    $sql = 'SELECT * from competence';

    $sth = $bdd->prepare($sql);
    $sth->execute();
    
    return $sth->fetchAll();
}

function get_skills_of_sae($sae)
{
    global $bdd;

    $sql = 'SELECT competence.* from sae_competence
    inner join competence on sae_competence.competence_id = competence.id
    inner join sae on sae_competence.sae_id = sae.id
    where sae.id = ?';

    $sth = $bdd->prepare($sql);
    $sth->execute([$sae]);

    return $sth->fetchAll();
}
