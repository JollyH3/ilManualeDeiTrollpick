<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
define("PAGE_TITLE", "archivio");
define("PAGE_SUBTITLE", "");
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <?php include "includes/components/structure/head.php"; ?>
</head>
<body class="bg-dark">
    <div class="fixed-top bg-black">
        <?php include "includes/components/structure/main/header.php"; ?>
    </div>

        <?php include "includes/components/structure/main/top.php"; ?>
    <div class="container mt-5 text-white">
        <div class="row">
                <p class="lead">
                    Questa sezione riguarda tutti i trollpick in duo <span class="text-success">Fierik</span>.
                    Se volete contribure a migliorare il sito potete inviarci dei trollpick in duo che avete ideato voi
                    contattandoci tramite il form nella sezione <span class="text-info fw-bold">Contatti</span>.
                </p>

            <?php include "includes/components/structure/main/bottom.php"; ?>

        </div>
    </div>
</body>
