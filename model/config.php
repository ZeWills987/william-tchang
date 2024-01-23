<?php /*
$user = "nukmrmpr_lnoise";
$password = "_-wfevg&P*,@8,2";
$database = "nukmrmpr_portfolio";

try {
    $bdd = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : Connexion à la base de donnée échoué ' . $e->getMessage());
}*/

$user = "william";
$password = "william";
$database = "nukmrmpr_portfolio";

try {
    $bdd = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur : Connexion à la base de donnée échoué ' . $e->getMessage());
}
