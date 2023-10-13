<?php

include_once 'includes/_config.php';
require_once 'includes/_functions.php';
include_once  'includes/_head.php';
// Json file
try {
    $fileContent = file_get_contents("datas/series.json");
    $series = json_decode($fileContent, true);
} catch (Exception $e) {
    echo "Something went wrong with json file...";
    exit;
}

?>


        <section class="exercice">
            Sur cette page un fichier comportant les données de séries télé est importé côté serveur. (voir datas/series.json)
            Les données sont accessibles dans la variable $series.
        </section>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Récupérer dans un tableau puis afficher l'ensemble des plateformes de diffusion des séries. Afficher les par ordre alphabétique.</p>
            <div class="exercice-sandbox">
                <?php
                // $arrayPlatforms = [];
                // foreach ($series as $serie) {
                //     $arrayPlatforms[] = $serie['availableOn'];
                // }

                // $arrayPlatforms = array_map(fn($s) => $s['availableOn'], $series);

                $arrayPlatforms = array_column($series, 'availableOn');

                $arrayPlatforms = array_unique($arrayPlatforms);

                sort($arrayPlatforms);

                echo turnArrayIntoString($arrayPlatforms);
                ?>
            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice" id="question2">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Afficher la liste de toutes les séries avec l'image principale et son titre</p>
            <p class="exercice-txt">Afficher une seule série par ligne sur les plus petits écrans, 2 séries par ligne sur les écrans intermédiaires et 4 séries par ligne sur un écran d'ordinateur.</p>
            <div class="exercice-sandbox">
                <?php
                
                $seriesToDisplay = $series;

                if (isset($_GET['style'])) {
                    $style = urldecode($_GET['style']);

                    // $filteredSeries = [];
                    // foreach ($series as $serie) {
                    //     if (in_array($style, $serie['styles'])) {
                    //         $filteredSeries[] = $serie;
                    //     }
                    // }

                    $seriesToDisplay = array_filter($series, fn($s) => in_array($style, $s['styles']));
                }

                echo getHTMLSeries($seriesToDisplay);
                
                // echo getHTMLSeries(isset($_GET['style']) ? array_filter($series, fn($s) => in_array(urldecode($_GET['style']), $s['styles'])) : $series);
                
                ?>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Ajouter un lien aux séries listées ci-dessus menant à cette page avec en paramètre "serie", l'identifiant de la série</p>
            <div class="exercice-sandbox">

            </div>
        </section>


        <!-- QUESTION 4 -->
        <section id="question4" class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Si l'URL de la page appelée comporte l'identifiant d'une série, alors afficher toutes les informations de la série ci-dessous.</p>
            <p class="exercice-txt">Si l'identifiant ne correspond à aucune série, afficher un message d'erreur.</p>
            <div class="exercice-sandbox">
                <?php

                if (isset($_GET['serie'])) {
                    $serie = getSerieDataFromId(intval($_GET['serie']));

                    echo is_array($serie) ? getSerieHTML($serie, true) : '<p>Cette série n\'existe pas.</p>';
                } else {
                    echo '<p>Aucune série à afficher</p>';
                }

                ?>
            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Récupérer dans un tableau l'ensemble des styles de séries dans une liste HTML. Afficher les par ordre alphabétique dans une liste HTML.</p>
            <div class="exercice-sandbox">
                <?php

                displayStylesList($series);

                ?>
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Ajoutez après chaque style de la liste ci-dessus, le nombre de séries correspondantes entre parenthèses.</p>
            <div class="exercice-sandbox">

            </div>
        </section>

        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">Ajoutez un lien à chaque nom de style ci-dessus menant à cette page avec en paramètre "style" le nom du style.</p>
            <div class="exercice-sandbox">

            </div>
        </section>

        <!-- QUESTION 8 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Si l'URL de la page appelée comporte un style, affichez à la Question 2 uniquement les séries de ce style.</p>
            <div class="exercice-sandbox">

            </div>
        </section>
<?php

include_once 'includes/_footer.php';