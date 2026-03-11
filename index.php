<?php
require_once 'autoload.php';

try {
    $monFilm = new Film("F1", "Inception", 148, 4.8, 160000000, 836800000);
    $maSerie = new Serie("S1", "Breaking Bad", 45, 4.9, "Terminée");
    $maSerie->ajouterEpisode(new Episode(1, "Pilot", 58, "2008-01-20"));

    $user = new Utilisateur("U1", "Jean Dupont", "jean@email.com", true);
    $user->ajouterHistorique($monFilm);

    $maListe = new Playlist("À voir absolument");
    $maListe->ajouterVideo($monFilm);
    $maListe->ajouterVideo($maSerie);

    $catalogue = new Catalogue();
    $catalogue->ajouterContenu($monFilm);
    $catalogue->ajouterContenu($maSerie);

} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système de Streaming POO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php if (isset($error)): ?>
        <div style="color:red; padding:10px; border:1px solid red;">
            Erreur : <?= $error ?>
        </div>
    <?php else: ?>

        <div class="main-container">
            <h1>SYSTÈME DE STREAMING PHP POO</h1>

            <section class="profil">
                <h2>MON PROFIL</h2>
                <?= $user->afficherProfil() ?>
                <blockquote><?= $user->afficherHistorique() ?></blockquote>
            </section>

            <section class="playlist">
                <h2>MA PLAYLIST</h2>
                <pre><?= $maListe->afficherDetails() ?></pre>
            </section>

            <section class="catalogue">
                <h2>CATALOGUE COMPLET</h2>
                <?= $catalogue->afficherTout() ?>
            </section>
        </div>

    <?php endif; ?>

</body>
</html>