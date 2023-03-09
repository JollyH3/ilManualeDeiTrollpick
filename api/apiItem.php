<?php
$conn = new mysqli("localhost", "root", "", "trollpick");
$sql = "SElECT * FROM item ORDER BY item_id";
$result = $conn->query($sql);
$item = $result->fetch_all(MYSQLI_ASSOC);

$sql = "SElECT * FROM item_build ORDER BY child_item_id";
$result = $conn->query($sql);
$item_build = $result->fetch_all(MYSQLI_ASSOC);

$dataIn = json_decode(file_get_contents('php://input'), true);
$role = $dataIn['role'];
$champion = $dataIn['champion'];

$item_tags = [];
for ($i = 0; $i < count($item); $i++){
    $item_tags[$i] = json_decode($item[$i]['tags']);  
}
?>
<?php if($role == "Everything"): ?>
    <div class="p-2" id="start_item">
        <h4 class="text-uppercase text-danger">start</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array('Start', $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="potion_item">
        <h4 class="text-uppercase text-danger">potions</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array('Potions', $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="basic_item">
            <h4 class="text-uppercase text-danger">basic</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array('Basic', $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="boots_item">
        <h4 class="text-uppercase text-danger">boots</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array('Boots', $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="epic_item">
        <h4 class="text-uppercase text-danger">epic</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array('Epic', $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="legenday_item">
        <h4 class="text-uppercase text-danger">legendary</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array('Legendary', $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="mythuc_item">
            <h4 class="text-uppercase text-danger">mythic items</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array('Mythic', $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
<?php else:?>
    <div class="p-2" id="start_item">
        <h4 class="text-uppercase text-danger">start</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array($role, $item_tags[$i]) && in_array("Start", $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="basic_item">
            <h4 class="text-uppercase text-danger">basic</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array($role, $item_tags[$i]) && in_array("Basic", $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="boots_item">
        <h4 class="text-uppercase text-danger">boots</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array("Boots", $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="boots_item">
        <h4 class="text-uppercase text-danger">epic</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array($role, $item_tags[$i]) && in_array("Epic", $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="legendary_item">
        <h4 class="text-uppercase text-danger">legendary</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array($role, $item_tags[$i]) && in_array("Legendary", $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="mythic_item">
            <h4 class="text-uppercase text-danger">mythic items</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array($role, $item_tags[$i]) && in_array("Mythic", $item_tags[$i])):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
<?php endif?>
