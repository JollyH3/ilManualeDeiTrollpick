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
                    Questa sezione riguarda tutti i trollpick di <span class="text-success">Fierik</span> Archiviati.
                    Probabilemente questi pick non andranno bene per la versione attuale del gioco.
                </p>

            <?php include "includes/components/structure/main/bottom.php"; ?>

        </div>
    </div>

    <?php include "includes/components/structure/footer.php"; ?>

</body>
