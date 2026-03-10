<?php
require_once 'autoload.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système de Streaming POO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
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

    echo "<div class='main-container'>";
        echo "<h1>SYSTÈME DE STREAMING PHP POO</h1>";

        echo "<section class='profil'>";
            echo "<h2>MON PROFIL</h2>";
            echo ($user->afficherProfil() . "\n");
            echo "<blockquote>" . ($user->afficherHistorique()) . "</blockquote>";
        echo "</section>";

        echo "<section class='playlist'>";
            echo "<h2>MA PLAYLIST</h2>";
            echo "<pre>" . $maListe->afficherDetails() . "</pre>";
        echo "</section>";

        echo "<section class='catalogue'>";
            echo "<h2>CATALOGUE COMPLET</h2>";
            echo ($catalogue->afficherTout());
        echo "</section>";

    echo "</div>"; 

} catch (Exception $e) {
    echo "<div style='color:red; padding:10px; border:1px solid red;'>Erreur : " . $e->getMessage() . "</div>";
}
?>
</body>
</html>