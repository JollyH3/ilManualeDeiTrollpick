<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);

define("PAGE_TITLE", "Trollpick in Solo");
define("PAGE_SUBTITLE", "");
include "../getData.php";
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
            <div class="col-md-6">
                <p class="lead">
                    Questa sezione riguarda tutti i trollpick di <span class="text-success">Fierik</span>.
                    Ci saranno tutti i trollpick fatti durante gli anni da <span class="text-success">Fierik</span>.
                    Ovviamente qui troverete solo i trollpick aggioranti e funzionanti per la stagione attuale.
                    Per i trollpick più vecchi, potete trovarli nella sezione <span class="text-danger fw-bold">Archivio</span>.
                    Se volete contribure a migliorare il sito potete inviarci dei trollpick che avete ideato voi o dei pick che
                    ci siamo persi di <span class="text-success">Fierik</span> potete farlo tramite il form
                    <span class="text-info fw-bold">Consiglia Trollpick</span>.
                </p>
            </div>
            <div class="col-md-6">
                <img class="img-fluid rounded" src="https://lh6.googleusercontent.com/hkX3AlKFYgf5V2s__JtX8oUAFMQKwgrGacasoEpgAspfO0NEE80IYE6PB9u2S8Q-n2e0jarOCfAMXaO2Lc_s9fpFNlOZWFhyG6uv_hzNwrDdCQHIsjfI0VB8dY4IKzZqfrZWT05bgcLTcd9mX8sluvUptgeRbfTmCdCz5hazUuggjoLKSMh-f8KE5ybhrS5U=w1280" alt="">
            </div>
            <br><hr><br>
            <!-- champions list -->
            <div class="d-flex flex-wrap justify-content-center">
                <?php $data = getData("trollpick", "champion", "name, image, champion_id", "name");
                    for ($i = 0; $i < count($data); $i++):
                    ?>
                        <a class="text-decoration-none" href="<?='trollpick/index.php?id=' . $i?>">
                            <div class="card border-0 m-2 mb-4 bg-transparent" style="width: 10rem;">
                                <img src="<?=$data[$i]["image"]?>" class="card-img-top rounded" alt="<?=$data[$i]["name"]?>">
                                <div class="card-body bg-dark p-2">
                                    <p class="card-text text-white text-center text-uppercase fw-bold fs-5"><?=$data[$i]["name"]?></p>
                                </div>
                            </div>
                        </a>
                <?php endfor;?>
            </div>

                <?php include "includes/components/structure/main/bottom.php"; ?>

        </div>
    </div>


    <?php include "includes/components/structure/footer.php"; ?>

</body>
</html>
