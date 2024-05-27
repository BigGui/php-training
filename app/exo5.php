<?php
include "./include/_functions.php";
include "./include/_seriesFunctions.php";

// Json file
try {
    $fileContent = file_get_contents("datas/series.json");
    $series = json_decode($fileContent, true);
} catch (Exception $e) {
    echo "Something went wrong with json file...";
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Introduction PHP - Exo 5</title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 5</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a href="index.php" class="main-nav-link">Entrainement</a></li>
                    <li><a href="exo2.php" class="main-nav-link">Donnez moi des fruits</a></li>
                    <li><a href="exo3.php" class="main-nav-link">Donnez moi de la thune</a></li>
                    <li><a href="exo4.php" class="main-nav-link">Donnez moi des fonctions</a></li>
                    <li><a href="exo5.php" class="main-nav-link active">Netflix</a></li>
                    <li><a href="exo6.php" class="main-nav-link">Mini-site</a></li>
                </ul>
            </nav>
        </header>

        <section class="exercice">
            Sur cette page un fichier comportant les données de séries télé est importé côté serveur. (voir datas/series.json)
            Les données sont accessibles dans la variable $series.
        </section>

        <section class="exercice">
            <div class="exercice-sandbox">
                <nav>
                    <?= generateStylesList($series) ?>
                </nav>
            </div>
        </section>

        <section class="exercice">
            <h2 class="exercice-ttl">Les séries</h2>
            <div class="exercice-sandbox">
                <?php

                if (isset($_GET['style'])) {
                    // $filteredSeries = [];
                    // foreach ($series as $show) {
                    //     if(in_array($_GET['style'], $show['styles'])) {
                    //         $filteredSeries[] = $show;
                    //     }
                    // }
                    $filteredSeries = array_filter($series, fn($s) => in_array($_GET['style'], $s['styles']));
                }
                else {
                    $filteredSeries = $series;
                }
                
                echo generateSeries($filteredSeries);
                
                ?>
            </div>
        </section>

        <section id="question4" class="exercice">
            <div class="exercice-sandbox">
                <?= generateSelectedShow($series) ?>
            </div>
        </section>

    </div>
    <div class="copyright">© Guillaume Belleuvre, 2023 - DWWM</div>
</body>

</html>