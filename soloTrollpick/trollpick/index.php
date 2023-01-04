<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
include "getData.php";
$id = $_GET["id"];
$champions = getData("trollpick", "champion", "everything", "name");
$data = $champions[$id];
$trollpick = getData("trollpick", "trollpick", "everything", "champion_id, name");
$spells_key = ['Q', 'W', 'E', 'R'];
?>


<html>

<head>
	<?php include "../../includes/components/structure/head.php";?>
</head>

<body data-bs-theme="dark">
	<div class="fixed-top">
		<?php include "../../includes/components/structure/main/header.php";?>
	</div>
	<div class="container ml-5 mr-5">
		<div class="parallax-window mt-5" data-parallax="scroll">
			<div class="d-flex flex-column justify-content-center" style="height: 50vh;">
				<div class="py-5 w-100 text-center">
					<h1 class="display-1 fw-bold text-white text-uppercase mt-5"><?=$data['name'];?></h1>
					<h5 class="fw-bold text-white my-3"><?=$data['version'];?></h5>
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-5 bg-dark">
		<div class="d-flex flex-wrap justify-content-center">
			<?php for ($i = 0; $i < count($trollpick); $i++): ?>
			<?php if ($trollpick[$i]['champion_id'] == $data['champion_id']): ?>
			<div class="p-5">
				<a class="btn btn-lg btn-dark bg-body-tertiary" href="trollpickBuild/index.php?id=<?=$trollpick[$i]['trollpick_id'];?>">
                <?=$trollpick[$i]['name'];?>
				</a>
			</div>
			<?php endif;?>
			<?php endfor;?>
		</div>

		<div class="row g-5">
			<div class="col-12 col-md-12 col-lg-9 order-1 order-lg-0">
				<table class="table table-borderless bg-dark-subtle rounded">
					<thead>
						<tr>
							<h2 class="text-center fw-bold fs-2 mb-4">
								Statistiche Base
							</h2>
							<?php $stats = json_decode($data["stats"], true);?>
						</tr>
					</thead>
					<tbody>
						<tr class="row">
							<td class="p-4 col-12 col-sm-6">
								<p
									class="fw-bold text-uppercase text-center text-warning-emphasis fs-6 d-flex justify-content-center align-items-center">
									<img src="https://static.wikia.nocookie.net/leagueoflegends/images/1/17/Health_icon.png" height="14"
										width="14" alt="" class="me-2">
									Salute
								</p>
								<p class="text-center font-monospace text-danger-emphasis fs-6 mb-0">
									<?=$stats['hp'];?>
								</p>
							</td>
							<td class="p-4 col-12 col-sm-6">
								<p
									class="fw-bold text-uppercase text-center text-warning-emphasis fs-6 d-flex justify-content-center align-items-center">
									<img src="https://static.wikia.nocookie.net/leagueoflegends/images/3/31/Health_regeneration_icon.png"
										height="14" width="14" alt="" class="me-2">
									Rigenerazione salute
								</p>
								<p class="text-center font-monospace text-danger-emphasis fs-6 mb-0">
									<?=$stats['hpregen'];?>
								</p>
							</td>
						</tr>
						<tr class="row">
							<td class="p-4 col-12 col-sm-6">
								<p
									class="fw-bold text-uppercase text-center text-warning-emphasis fs-6 d-flex justify-content-center align-items-center">
									<img src="https://static.wikia.nocookie.net/leagueoflegends/images/8/8b/Mana_icon.png" height="14"
										width="14" alt="" class="me-2">
									Mana
								</p>
								<p class="text-center font-monospace text-danger-emphasis fs-6 mb-0">
									<?=$stats['mp'] == 0 ? "Non disponibile" : $stats['mp'];?>
								</p>
							</td>
							<td class="p-4 col-12 col-sm-6">
								<p
									class="fw-bold text-uppercase text-center text-warning-emphasis fs-6 d-flex justify-content-center align-items-center">
									<img src="https://static.wikia.nocookie.net/leagueoflegends/images/0/0c/Mana_regeneration_icon.png"
										height="14" width="14" alt="" class="me-2">
									Rigenerazione mana
								</p>
								<p class="text-center font-monospace text-danger-emphasis fs-6 mb-0">
									<?=$stats['mpregen'] == 0 ? "Non disponibile" : $stats['mpregen'];?>
								</p>
							</td>
						</tr>
						<tr class="row">
							<td class="p-4 col-12 col-sm-6">
								<p
									class="fw-bold text-uppercase text-center text-warning-emphasis fs-6 d-flex justify-content-center align-items-center">
									<img src="https://static.wikia.nocookie.net/leagueoflegends/images/f/f0/Armor_icon.png" height="14"
										width="14" alt="" class="me-2">
									Armatura
								</p>
								<p class="text-center font-monospace text-danger-emphasis fs-6 mb-0">
									<?=$stats['armor']?>
								</p>
							</td>
							<td class="p-4 col-12 col-sm-6">
								<p
									class="fw-bold text-uppercase text-center text-warning-emphasis fs-6 d-flex justify-content-center align-items-center">
									<img src="https://static.wikia.nocookie.net/leagueoflegends/images/7/75/Attack_damage_icon.png"
										height="14" width="14" alt="" class="me-2">
									Danno fisico
								</p>
								<p class="text-center font-monospace text-danger-emphasis fs-6 mb-0">
									<?=$stats["attackdamage"];?>
								</p>
							</td>
						</tr>
						<tr class="row">
							<td class="p-4 col-12 col-sm-6">
								<p
									class="fw-bold text-uppercase text-center text-warning-emphasis fs-6 d-flex justify-content-center align-items-center">
									<img src="https://static.wikia.nocookie.net/leagueoflegends/images/8/84/Magic_resistance_icon.png"
										height="14" width="14" alt="" class="me-2">
									Resistenza magica
								</p>
								<p class="text-center font-monospace text-danger-emphasis fs-6 mb-0">
									<?=$stats['spellblock']?>
								</p>
							</td>
							<td class="p-4 col-12 col-sm-6">
								<p
									class="fw-bold text-uppercase text-center text-warning-emphasis fs-6 d-flex justify-content-center align-items-center">
									<img
										src="https://static.wikia.nocookie.net/leagueoflegends/images/0/0f/Critical_strike_damage_icon.png"
										height="14" width="14" alt="" class="me-2">
									Danno critico
								</p>
								<p class="text-center font-monospace text-danger-emphasis fs-6 mb-0">
									<?='175%';?>
								</p>
							</td>
						</tr>
						<tr class="row">
							<td class="p-4 col-12 col-sm-6">
								<p
									class="fw-bold text-uppercase text-center text-warning-emphasis fs-6 d-flex justify-content-center align-items-center">
									<img src="https://static.wikia.nocookie.net/leagueoflegends/images/e/ea/Movement_speed_icon.png"
										height="14" width="14" alt="" class="me-2">
									Velocità di movimento
								</p>
								<p class="text-center font-monospace text-danger-emphasis fs-6 mb-0">
									<?=$stats['movespeed']?>
								</p>
							</td>
							<td class="p-4 col-12 col-sm-6">
								<p
									class="fw-bold text-uppercase text-center text-warning-emphasis fs-6 d-flex justify-content-center align-items-center">
									<img src="https://static.wikia.nocookie.net/leagueoflegends/images/1/13/Range_icon.png" height="14"
										width="14" alt="" class="me-2">
									Range di attacco
								</p>
								<p class="text-center font-monospace text-danger-emphasis fs-6 mb-0">
									<?=$stats['attackrange'];?>
								</p>
							</td>
						</tr>
						<tr class="row">
							<td class="p-4 col-12 col-sm-6">
								<p
									class="fw-bold text-uppercase text-center text-warning-emphasis fs-6 d-flex justify-content-center align-items-center">
									Velocità d'attacco base
								</p>
								<p class="text-center font-monospace text-danger-emphasis fs-6 mb-0">
									<?=$stats['attackspeed']?>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div
				class="col-12 col-md-12 col-lg-3 order-0 order-lg-1 d-flex flex-column justify-content-center align-items-center">
				<img
					src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/<?=pathinfo($data['splash'])['basename']?>"
					alt="" class="rounded-2 w-100 d-none d-lg-block">
				<p class="fs-3 fw-bold m-0 mt-2 text-uppercase">
					<?=$data['name'];?>
				</p>
			</div>
		</div>
		<div class="mt-5">
			<h2 class="text-center fw-bold fs-2 mb-4">
				Abilità
			</h2>
			<div class="">
				<div class="card border-0 bg-dark-subtle mb-4">
					<div class="card-body">
						<h5 class="text-warning-emphasis fw-bold mb-4">
							<span class="badge bg-warning-subtle">
								P
							</span>
							<?=json_decode($data['passive'], true)['name'];?>
						</h5>
						<div class="d-flex">
							<div class="flex-shrink-0">
								<img class="rounded shadow-sm"
									src="<?="http://ddragon.leagueoflegends.com/cdn/12.23.1/img/passive/" . json_decode($data['passive'], true)["image"]['full'];?>"
									alt="">
							</div>
							<div class="flex-grow-1 ms-3">
								<?=json_decode($data["passive"], true)['description'];?>
							</div>
						</div>
					</div>
				</div>
				<?php for ($i = 0; $i < 4; $i++): ?>


				<div class="card border-0 bg-dark-subtle mb-4">
					<div class="card-body">
						<h5 class="text-warning-emphasis fw-bold mb-4">
							<span class="badge bg-warning-subtle">
								<?=$spells_key[$i]?>
							</span>
							<?=json_decode($data['spells'], true)[$i]['name'];?>
						</h5>
						<div class="d-flex">
							<div class="flex-shrink-0">
								<img class="rounded shadow-sm"
									src="<?="http://ddragon.leagueoflegends.com/cdn/12.23.1/img/spell/" . json_decode($data['spells'], true)[$i]['image']['full'];?>"
									alt="<?=json_decode($data['spells'], true)[0]['image']['full'];?>">
							</div>
							<div class="flex-grow-1 ms-3">
								<?=json_decode($data["spells"], true)[$i]['description'];?>
							</div>
						</div>
					</div>
				</div>
				<?php endfor;?>
			</div>
		</div>

		<?php include "../../includes/components/structure/main/bottom.php";?>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
		integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
	<script>
	$('.parallax-window').parallax({
		imageSrc: '<?=$data["splash"];?>' +
			'',
		speed: 0.4
	});
	</script>
</body>

</html>