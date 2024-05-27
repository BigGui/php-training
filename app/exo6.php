<?php
include "./include/_functions.php";
include 'include/_config.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <title>Introduction PHP - Exo 6</title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 6</h1>
            <nav class="main-nav">
                <?= generateMainNav($pages)?>
            </nav>
        </header>

        <section class="exercice">
            Les questions suivantes ont pour vocation a faire évoluer et à généraliser la structure du code de ce mini-site d'exercice.
        </section>

        <!-- QUESTION 1 -->
        <section id="question1" class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Créez un tableau listant toutes les pages du site et contenant toutes les données qui leurs sont associées.</p>
            <p class="exercice-txt">Afficher l'intégralité du tableau sur la page.</p>
            <div class="exercice-sandbox">

            </div>
        </section>

        <!-- QUESTION 2 -->
        <section id="question2" class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Implémenter une fonction qui génére le code HTML du menu de navigation du site.</p>
            <p class="exercice-txt">Utiliser cette fonction pour afficher le menu sur l'ensemble des pages du site.</p>
            <div class="exercice-sandbox">

            </div>
        </section>

        <!-- QUESTION 3 -->
        <section id="question3" class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Placez tout le code en commun en entête de toutes les pages dans un fichier spécifique.</p>
            <p class="exercice-txt">Utiliser ce fichier pour afficher l'entête de chaque page.</p>
            <div class="exercice-sandbox">

            </div>
        </section>

        <!-- QUESTION 4 -->
        <section id="question4" class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Effectuez la même opération que la question précédente pour le footer des pages.</p>
            <div class="exercice-sandbox">

            </div>
        </section>
    </div>
    <div class="copyright">© Guillaume Belleuvre, 2023 - DWWM</div>
</body>

</html>