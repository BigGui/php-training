<?php
include "./include/_functions.php";
include "./include/_seriesFunctions.php";

include 'include/_config.php';


// Json file
try {
    $fileContent = file_get_contents("datas/series.json");
    $series = json_decode($fileContent, true);
} catch (Exception $e) {
    echo "Something went wrong with json file...";
    exit;
}

$currentPage = getCurrentPageDetails($pages);
include 'include/_header.php';
?>


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
<?php
include 'include/_footer.php';

?>