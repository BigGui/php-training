<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= linkCssFiles($currentPage['css']) ?>
    <title><?= $currentPage['title'] ?></title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl"><?= $currentPage['title'] ?></h1>
            <nav class="main-nav">
                <?= generateMainNav($pages) ?>
            </nav>
        </header>