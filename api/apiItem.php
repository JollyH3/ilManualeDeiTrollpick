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

$item_child = [];
for ($j = 0; $j <count($item_build); $j++) {
    $item_child[$j] = $item_build[$j]['child_item_id'];
}
$item_parent = [];
for ($j = 0; $j <count($item_build); $j++) {
    $item_parent[$j] = $item_build[$j]['parent_item_id'];
}
?>
<?php if($role == "everything"): ?>
    <div class="p-2" id="start_item">
        <h4 class="text-uppercase text-danger">start</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (!in_array($item[$i]['item_id'], $item_parent) && json_decode($item[$i]['gold'], true)['purchasable'] == true && json_decode($item[$i]['maps'], true)['11'] == true && json_decode($item[$i]['gold'], true)['base'] != 0 && !in_array('Consumable', json_decode($item[$i]['tags'], true)) && !in_array('Boots', json_decode($item[$i]['tags'], true)) && in_array('Lane', json_decode($item[$i]['tags'], true)) && $item[$i]['item_id'] != 1040 && $item[$i]['item_id'] != 1036 || in_array('Jungle', json_decode($item[$i]['tags'], true)) && !in_array('Consumable', json_decode($item[$i]['tags'], true)) && $item[$i]['item_id'] != 1040 && json_decode($item[$i]['gold'], true)['base'] != 0 && json_decode($item[$i]['gold'], true)['purchasable'] == true):?>
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
                    <?php if (json_decode($item[$i]['gold'], true)['purchasable'] == true && json_decode($item[$i]['maps'], true)['11'] == true && json_decode($item[$i]['gold'], true)['base'] != 0 && in_array('Consumable', json_decode($item[$i]['tags'], true)) && $item[$i]['item_id'] != 2055):?>
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
                    <?php if (!in_array($item[$i]['item_id'], $item_parent) && json_decode($item[$i]['gold'], true)['purchasable'] == true && json_decode($item[$i]['maps'], true)['11'] == true && json_decode($item[$i]['gold'], true)['base'] != 0 && !in_array('Consumable', json_decode($item[$i]['tags'], true)) && !in_array('Boots', json_decode($item[$i]['tags'], true)) && !in_array('Lane', json_decode($item[$i]['tags'], true)) && !in_array('Jungle', json_decode($item[$i]['tags'], true)) && $item[$i]['item_id'] != 4638 && $item[$i]['item_id'] != 2421 || $item[$i]['item_id'] == 1036):?>
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
                    <?php if (in_array('Boots', json_decode($item[$i]['tags'], true)) && json_decode($item[$i]['gold'], true)['purchasable'] == true):?>
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
                    <?php if (in_array($item[$i]['item_id'], $item_parent) && json_decode($item[$i]['gold'], true)['purchasable'] == true && json_decode($item[$i]['gold'], true)['total'] > 690 && json_decode($item[$i]['gold'], true)['total'] < 1500 && !in_array('Boots', json_decode($item[$i]['tags'], true))):?>
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
                    <?php if (!in_array($item[$i]['item_id'], $item_child) && json_decode($item[$i]['gold'], true)['purchasable'] == true && json_decode($item[$i]['gold'], true)['total'] > 1000 && json_decode($item[$i]['gold'], true)['total'] < 3800 && !in_array('Boots', json_decode($item[$i]['tags'], true))):?>
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
                    <?php if (in_array($item[$i]['item_id'], $item_child) && json_decode($item[$i]['gold'], true)['purchasable'] == true && json_decode($item[$i]['gold'], true)['total'] > 2000 && json_decode($item[$i]['gold'], true)['total'] < 3800 && !in_array('Boots', json_decode($item[$i]['tags'], true))):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
<?php elseif($role == "fighter"):?>
    <div class="p-2" id="start_item">
        <h4 class="text-uppercase text-danger">start</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (!in_array($item[$i]['item_id'], $item_parent) && json_decode($item[$i]['gold'], true)['purchasable'] == true && json_decode($item[$i]['maps'], true)['11'] == true && json_decode($item[$i]['gold'], true)['base'] != 0 && !in_array('Consumable', json_decode($item[$i]['tags'], true)) && !in_array('Boots', json_decode($item[$i]['tags'], true)) && in_array('Lane', json_decode($item[$i]['tags'], true)) && $item[$i]['item_id'] != 1040 && $item[$i]['item_id'] != 1036 && in_array('Damage', json_decode($item[$i]['tags'], true)) || in_array('Jungle', json_decode($item[$i]['tags'], true)) && !in_array('Consumable', json_decode($item[$i]['tags'], true)) && $item[$i]['item_id'] != 1040 && json_decode($item[$i]['gold'], true)['base'] != 0 && json_decode($item[$i]['gold'], true)['purchasable'] == true && in_array('Damage', json_decode($item[$i]['tags'], true))):?>
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
                    <?php if (!in_array($item[$i]['item_id'], $item_parent) && json_decode($item[$i]['gold'], true)['purchasable'] == true && json_decode($item[$i]['maps'], true)['11'] == true && json_decode($item[$i]['gold'], true)['base'] != 0 && !in_array('Consumable', json_decode($item[$i]['tags'], true)) && !in_array('Boots', json_decode($item[$i]['tags'], true)) && !in_array('Lane', json_decode($item[$i]['tags'], true)) && !in_array('Jungle', json_decode($item[$i]['tags'], true)) && $item[$i]['item_id'] != 4638 && $item[$i]['item_id'] != 2421  && in_array('Damage', json_decode($item[$i]['tags'], true)) || $item[$i]['item_id'] == 1036 && in_array('Damage', json_decode($item[$i]['tags'], true))):?>
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
                    <?php if (in_array('Boots', json_decode($item[$i]['tags'], true)) && json_decode($item[$i]['gold'], true)['purchasable'] == true):?>
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
                    <?php if (in_array($item[$i]['item_id'], $item_parent) && json_decode($item[$i]['gold'], true)['purchasable'] == true && json_decode($item[$i]['gold'], true)['total'] > 690 && json_decode($item[$i]['gold'], true)['total'] < 1500 && !in_array('Boots', json_decode($item[$i]['tags'], true)) && in_array('Damage', json_decode($item[$i]['tags'], true))):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="boots_item">
        <h4 class="text-uppercase text-danger">legendary</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (!in_array($item[$i]['item_id'], $item_child) && json_decode($item[$i]['gold'], true)['purchasable'] == true && json_decode($item[$i]['gold'], true)['total'] > 1000 && json_decode($item[$i]['gold'], true)['total'] < 3800 && !in_array('Boots', json_decode($item[$i]['tags'], true)) && in_array('Damage', json_decode($item[$i]['tags'], true))):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
        <div class="p-2" id="boots_item">
            <h4 class="text-uppercase text-danger">mythic items</h4>
            <div class="d-flex flex-wrap justify-content-start m-3">
                <?php for ($i = 0; $i < count($item); $i++): ?>
                    <?php if (in_array($item[$i]['item_id'], $item_child) && json_decode($item[$i]['gold'], true)['purchasable'] == true && json_decode($item[$i]['gold'], true)['total'] > 2000 && json_decode($item[$i]['gold'], true)['total'] < 3800 && !in_array('Boots', json_decode($item[$i]['tags'], true)) && in_array('Damage', json_decode($item[$i]['tags'], true))):?>
                        <div id="<?= $item[$i]['item_id'];?>" class="card" style="width: 4rem;">
                            <img src="<?= $item[$i]['image'];?>" class="card-img-top" alt="<?= $item[$i]['name'];?>">
                        </div>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
<?php endif?>
