<?php

$fruits = ["fraise", "banane", "pomme", "cerise", "abricot", "pêche", "ananas", "kiwi"];

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <title>Introduction PHP - Exo 2</title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 2</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a href="index.php" class="main-nav-link">Entrainement</a></li>
                    <li><a href="exo2.php" class="main-nav-link active">Donnez moi des fruits</a></li>
                    <li><a href="exo3.php" class="main-nav-link">Donnez moi de la thune</a></li>
                    <li><a href="exo4.php" class="main-nav-link">Donnez moi des fonctions</a></li>
                    <li><a href="exo5.php" class="main-nav-link">Netflix</a></li>
                    <li><a href="exo6.php" class="main-nav-link">Mini-site</a></li>
                </ul>
            </nav>
        </header>
        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Afficher le détail de tout le tableau de fruits</p>
            <div class="exercice-sandbox">
                <?php
                var_dump($fruits);
                ?>

            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Afficher les fruits dans une liste HTML non ordonnée</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    foreach ($fruits as $fruit) {
                        echo "<li>" . $fruit . "</li>";
                    }
                    ?>
                </ul>

            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Afficher les fruits dans une liste HTML non ordonnée avec pour chacun d'eux sa position dans la liste</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php

                    // unset($fruits[3]);

                    for ($i = 0; $i < count($fruits); $i++) {
                        echo "<li>" . $fruits[$i] . " et sa position " . $i . "</li>";
                    }


                    foreach ($fruits as $i => $fruit) {
                        echo "<li>{$i} => " . $fruit . "</li>";
                    }

                    ?>
                </ul>

            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Afficher 1 fruit sur 2 dans une liste HTML, en commençant par la fraise</p>
            <div class="exercice-sandbox">

                <ul>
                    <?php
                    foreach ($fruits as $i => $fruit) {
                        if ($i % 2 === 0) {
                            echo "<li>" . $fruit . "</li>";
                        }
                    }

                    $display = true;
                    foreach ($fruits as $fruit) {
                        if ($display) {
                            echo "<li>" . $fruit . "</li>";
                        }
                        $display = !$display;
                    }

                    for ($i = 0; $i < count($fruits); $i += 2) {
                        echo "<li>" . $fruits[$i] . "</li>";
                    }
                    ?>
                </ul>

            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Afficher un fruit aléatoire du tableau</p>
            <div class="exercice-sandbox">
                <?php
                /*echo $fruits[random_int(0, sizeof($fruits)-1)];*/
                echo $fruits[array_rand($fruits)];
                ?>
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Afficher les fruits dans un ordre aléatoire</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    shuffle($fruits);
                    foreach ($fruits as $fruit) {
                        // echo '<li>' . $fruit . '</li>';
                        echo "<li>{$fruit}</li>";
                    }


                    // $randomFruits = [];

                    // while (count($fruits) > 0) {
                    //     $index = array_rand($fruits);
                    //     $randomFruits[] = $fruits[$index];
                    //     unset($fruits[$index]);
                    // }

                    // var_dump($randomFruits);

                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">Afficher les fruits dont la chaîne de caractère est composée de 5 caractères au maximum</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    foreach ($fruits as $fruit) {
                        if (mb_strlen($fruit) <= 5) {
                            echo "<li>{$fruit}</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 8 -->
        <?php
        $breakfast = "Tous les matins je mange une pomme et une banane avec une cuillère de miel.";
        ?>
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Dans la phrase suivante : "<?= $breakfast ?>"</p>
            <p class="exercice-txt">Remplacez pomme par pêche et banane par mangue et affichez-la.</p>
            <div class="exercice-sandbox">
                <p>
                    <?php
                    echo str_replace(
                        ['pomme', 'banane', 'miel'],
                        ['pêche', 'mangue', 'sirop d\'agave'],
                        $breakfast
                    );
                    ?>
                </p>
            </div>
        </section>

        <!-- QUESTION 9 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Affichez la chaîne de caractère composée de l'ensemble des fruits de la liste, séparés par une virgule et un espace.</p>
            <div class="exercice-sandbox">
                   <p> <?php
                    // foreach($fruits as $i => $fruit){
                    //     if($i === 0) echo ucfirst($fruit) . ', ';
                    //     else if ($i === count($fruits) -1) echo $fruit . '.';
                    //     else echo $fruit . ', ';
                    // }
                    echo ucfirst(implode(", ", $fruits)) . '.';
                    ?></p>
            </div>
        </section>

        <!-- QUESTION 10 -->
        <?php

        $salad = "Dans ma salade de fruit préférée, il y a de la banane, des pêches, quelques fraises, des noix et une cuillère de miel.";

        ?>
        <section class="exercice">
            <h2 class="exercice-ttl">Question 10</h2>
            <p class="exercice-txt">Afficher dans une liste HTML tous les fruits de la liste qui apparaissent dans la phrase suivante : "<?= $salad ?>"</p>
            <div class="exercice-sandbox">

            </div>
        </section>
    </div>
    <div class="copyright">© Guillaume Belleuvre, 2023 - DWWM</div>
</body>

</html>