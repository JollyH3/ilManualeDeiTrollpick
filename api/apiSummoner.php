<?php
$conn = new mysqli("localhost", "root", "", "trollpick");
$sql = "SElECT * FROM summoner ORDER BY summoner_id";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);

$champion = $_POST['search'];
?>

<?php if ($champion == "Champion 1"):
    for($i = 0; $i < count($data); $i++): ?>
        <a id="<?=$data[$i]['summoner_id']?>" class="text-decoration-none" onclick="catchDuoSummoner('<?= $data[$i]['summoner_id'];?>', 0)">
            <div class="card border-0 m-2 mb-1 bg-transparent" style="width: 4.5rem;">
                <img src="<?=$data[$i]["image"]?>" class="card-img-top rounded" alt="<?=$data[$i]["name"]?>">
                <div class="card-body  p-1">
                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?=$data[$i]["name"]?></p>
                </div>
                <div id="<?= 'badge_' . $data[$i]['summoner_id'];?>"></div>
            </div>
        </a>
<?php endfor;
endif; ?>

<?php if ($champion == "Champion 2"):
    for($i = 0; $i < count($data); $i++): ?>
        <a id="<?=$data[$i]["summoner_id"]?>" class="text-decoration-none" onclick="catchDuoSummoner('<?= $data[$i]['summoner_id'];?>', 1)">
            <div class="card border-0 m-1 mb-1 bg-transparent" style="width: 4rem;">
                <img src="<?=$data[$i]["image"]?>" class="card-img-top rounded" alt="<?=$data[$i]["name"]?>">
                <div class="card-body  p-1">
                    <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?=$data[$i]["name"]?></p>
                </div>
                <div id="<?='badge_' . $data[$i]['summoner_id'];?>"></div>
            </div>
        </a>
<?php endfor;
endif; ?>