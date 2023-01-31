<?php
$championIn = $_POST['search'];

$championOut = "";
if (substr($championIn, 9, 1) == 0){
    $championOut = substr($championIn, 0, -2) . " " . 1;
    $championOut = str_replace("c", "C", $championOut);
}else {
    $championOut = substr($championIn, 0, -2) . " " . 2;
    $championOut = str_replace("c", "C", $championOut);
}

$spell = [
    0 => "Q",
    1 => "W",
    2 => "E",
]
?>
<h1 class="text-center m-3 text-warning-emphasis"><?= $championOut;?></h1>
<div class="container text-center">
    <?php for($j = 0; $j < 3; $j++): ?>
        <div class="row align-items-start">
        <div class="col">
        <h4 class="badge bg-warning p-3 px-4 font-monospace fw-bold fs-6" id="<?=('column_' . $j);?>"><?=$spell[$j];?></h4>
        </div>
            <?php for ($i = 0; $i < 5; $i++): ?>
                <div class="col" id="<?='row_' . $j . '&column_' . $i?>" onclick="catchDuoSpell(<?=$j;?>, <?=$i;?>, '<?=$championIn?>')">
                    <h4 class="badge bg-warning p-3 px-4 font-monospace fw-bold fs-6" id="spellRow_<?=$j . '&Column_' . $i?>"> </h4>
                </div> 
            <?php endfor;?>
        </div>
    <?php endfor;?>
    <div class="row align-items-start">
        <div class="col">
            <h4 class="badge bg-warning p-3 px-4 font-monospace fw-bold fs-6">LVL</h4>
        </div>
        <?php for ($i = 0; $i < 5; $i++): ?>
            <div class="col">
                <h4 class="badge bg-warning p-3 px-4 font-monospace fw-bold fs-6"><?=$i + 1?></h4>
            </div>
        <?php endfor?>
</div>