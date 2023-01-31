<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);

$conn = new mysqli("localhost", "root", "", "trollpick");
$sql = "SElECT * FROM item ORDER BY item_id";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);

$championIn = $_POST['search'];
$championOut = "";
if (substr($championIn, 9, 1) == 0){
    $championOut = substr($championIn, 0, -2) . " " . 1;
    $championOut = str_replace("c", "C", $championOut);
}else {
    $championOut = substr($championIn, 0, -2) . " " . 2;
    $championOut = str_replace("c", "C", $championOut);
}
?>
<h1 class="text-center m-3"><?= $championOut;?></h1>
<div class="d-flex flex-wrap justify-content-center">
<?php for($i = 0; $i < count($data); $i++):
?>
    <a id="<?='item_' . $data[$i]['item_id'] . " " . $championIn?>" class="text-decoration-none" onclick="catchItem('<?=$data[$i]["item_id"]?>')">
        <div class="card border-0 m-1 mb-1 bg-transparent" style="width: 4rem;">
            <img src="<?=$data[$i]["image"]?>" class="card-img-top rounded" alt="<?=$data[$i]["name"] ?>">
            <div class="card-body  p-1">
                <p class="card-text text-white text-center text-uppercase fw-bold" style="font-size: 8px"><?php echo $data[$i]["name"] ?></p>
            </div>
        </div>
     </a>
<?php endfor;?>
</div>