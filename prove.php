<?php
$conn = new mysqli("localhost", "root", "", "trollpick");
$sql = "SElECT * FROM item ORDER BY item_id";
$result = $conn->query($sql);
$item = $result->fetch_all(MYSQLI_ASSOC);

$sql = "SElECT * FROM item_build ORDER BY child_item_id";
$result = $conn->query($sql);
$item_build = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "includes/components/structure/head.php"; ?>
</head>
<body class="bg-black">
<div>
    <div class="modal fade show" id="exampleModalLive" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centerd">
            <div class="modal-content bg-dark">
            <div class="modal-header">
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">Primo campione (NOME CAMPIONE)</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="#">Secondo campione (NOME CAMPIONE)</a>
            </nav>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Vicino"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <nav class="nav nav-pills flex-column flex-sm-row">
                                <?php $role_image = ["https://static.wikia.nocookie.net/leagueoflegends/images/6/67/Specialist_icon.png",
                                                "https://static.wikia.nocookie.net/leagueoflegends/images/8/8f/Fighter_icon.png",
                                                "https://static.wikia.nocookie.net/leagueoflegends/images/7/7f/Marksman_icon.png",
                                                "https://static.wikia.nocookie.net/leagueoflegends/images/2/28/Slayer_icon.png",
                                                "https://static.wikia.nocookie.net/leagueoflegends/images/2/28/Mage_icon.png",
                                                "https://static.wikia.nocookie.net/leagueoflegends/images/5/5a/Tank_icon.png",
                                                "https://static.wikia.nocookie.net/leagueoflegends/images/5/58/Controller_icon.png"
                                                ];
                                        $role = ["everything",
                                                 "fighter",
                                                 "marksman",
                                                 "slayer",
                                                 "mage",
                                                 "tank",
                                                 "controller"];
                                        $item_child = [];
                                        for ($j = 0; $j <count($item_build); $j++) {
                                            $item_child[$j] = $item_build[$j]['child_item_id'];
                                        }
                                        $item_parent = [];
                                        for ($j = 0; $j <count($item_build); $j++) {
                                            $item_parent[$j] = $item_build[$j]['parent_item_id'];
                                        }
                                for ($i = 0; $i < count($role); $i++): ?>
                                <a class="flex-sm-fill text-sm-center nav-link" aria-current="page" onclick="chargeItem('<?= $role[$i];?>', 0)">
                                    <div class="card b-0 text-bg-dark rounded-4" style="width: 3.5rem;">
                                        <img src="<?= $role_image[$i];?>" class="card-img-top" alt="role">
                                    </div>
                                </a>
                                <?php endfor;?>
                            </nav>
                            <div id="item"><!-- item --></div>
                            <div class="d-flex flex-wrap justify-content-center">
                                
                            </div>
                        </div>
                        <div class="col-3">item build</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vicino</font></font></button>
                <button type="button" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Salvare le modifiche</font></font></button>
            </div>
            </div>
        </div>
    </div>
</div>

<script src="includes/components/structure/scripts/script4duo.js"></script>
</body>
</html>