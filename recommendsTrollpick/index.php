<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);

define("PAGE_TITLE", "Consiglia un Trollpick");
define("PAGE_SUBTITLE", "");
?>
<html>
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
                    In questa sezione potete consigliare un trollpick che avete ideato voi, che avete visto in una partita
                    o che ci siamo persi noi.
                </p>

            <?php include "includes/components/structure/main/bottom.php"; ?>

        </div>
    </div>

    <?php include "includes/components/structure/footer.php"; ?>


</body>
</html>
