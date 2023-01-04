<?php
set_include_path($_SERVER['DOCUMENT_ROOT']);
include "getData.php";
$id = $_GET["id"];
$conn = new mysqli("localhost", "root", "", "trollpick");
$sql = "SELECT * FROM trollpick WHERE trollpick_id = '$id'";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
$rune = getData("trollpick", "rune", "image", "rune_id");
?>
<html>

<head>
	<?php include "../../../includes/components/structure/head.php";?>
</head>

<body class="" data-bs-theme="dark">
	<div class="fixed-top bg-black">
		<?php include "../../../includes/components/structure/main/header.php";?>
	</div>
	<div class="container ml-5 mr-5">
		<div class="parallax-window mt-5" data-parallax="scroll">
			<div class="d-flex flex-column justify-content-center" style="height: 50vh;">
				<div class="py-5 w-100 text-center">
					<h1 class="display-1 fw-bold text-white text-uppercase mt-5">
						<?=getImage("name", "champion", "champion_id", "" . $data[0]['champion_id']) . " " . $data[0]["name"];?>
					</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="container text-center">

			<div class="d-flex justify-content-center mb-5">
				<div class="">
					<div class="d-flex">
						<div class="">
							<img src="<?="/assets/img/" . json_decode($data[0]["data"], true)["lane"] . ".png";?>" alt="">
						</div>
					</div>
				</div>
			</div>

			<div class="row g-2">
				<div class="col-12 col-lg-6 col-xl-4">
					<div class="d-flex flex-column flex-wrap">
						<?php
                            $trollpick = $data;
                            $data = json_decode($trollpick[0]['data'], true);
                            $rune = $data['rune'];

                            $rune_color = [
                                "Determinazione" => "success",
                                "Dominazione" => "danger",
                                "Ispirazione" => "info",
                                "Precisione" => "warning",
                                "Stregoneria" => "primary",
                            ];

                            $rune_image = [
                                "Determinazione" => "https://static.bigbrain.gg/assets/lol/runes/8400.png",
                                "Dominazione" => "https://static.bigbrain.gg/assets/lol/runes/8100.png",
                                "Ispirazione" => "https://static.bigbrain.gg/assets/lol/runes/8300.png",
                                "Precisione" => "https://static.bigbrain.gg/assets/lol/runes/8000.png",
                                "Stregoneria" => "https://static.bigbrain.gg/assets/lol/runes/8200.png",
                            ];

                            ?>

						<div class="card border-0 bg-dark-subtle">
							<div class="card-body">
								<?php $runa = getRune($rune[0])[0];?>
								<div class="card border-0 bg-opacity-10 bg-<?=$rune_color[$runa['category']];?> mb-2">
									<div class="card-body py-2">
										<div class="d-flex align-items-center">
											<img src="<?=$rune_image[$runa['category']];?>" alt="" height="80"
												class="bg-transparent rounded-3 me-3">
											<h3 class="text-<?=$rune_color[$runa['category']];?> fw-bold m-0">
												<?=$runa['category'];?>
											</h3>
										</div>
									</div>
								</div>


								<?php for ($i = 0; $i < 4; $i++): ?>
								<?php $runa = getRune($rune[$i])[0];?>
								<div class="card border-0 bg-dark-subtle mb-2">
									<div class="card-body">
										<?php if ($runa['position'] == 0): ?>
										<div class="d-flex align-items-center">
											<img src="<?=$runa['image'];?>" alt="" style="max-height: 64px;">
											<div class="ms-3 d-flex flex-column align-items-start">
												<h5 class="<?="text-" . $rune_color[$runa['category']] . "-emphasis";?> fw-bold mb-0">
													<?=$runa['name'];?>
												</h5>
											</div>
										</div>
										<?php else: ?>
										<div class="d-flex align-items-center">
											<img src="<?=$runa['image'];?>"
												class="border border-<?=$rune_color[$runa['category']];?> rounded-circle" alt=""
												style="max-height: 64px;">
											<div class="ms-3 d-flex flex-column align-items-start">
												<h5 class="<?="text-" . $rune_color[$runa['category']] . "-emphasis";?> fw-bold mb-0">
													<?=$runa['name'];?>
												</h5>
											</div>
										</div>
										<?php endif;?>
									</div>
								</div>
								<?php endfor;?>
							</div>
						</div>

					</div>
				</div>

				<div class="col-12 col-lg-6 col-xl-4">
					<div class="d-flex flex-column flex-wrap">
						<div class="card border-0 bg-dark-subtle mb-2">
							<div class="card-body">

								<?php $runa = getRune($rune[4])[0];?>
								<div class="card border-0 bg-opacity-10 bg-<?=$rune_color[$runa['category']];?> mb-2">
									<div class="card-body py-2">
										<div class="d-flex align-items-center">
											<img src="<?=$rune_image[$runa['category']];?>" alt="" height="80"
												class="bg-transparent rounded-3 me-3">
											<h3 class="text-<?=$rune_color[$runa['category']];?> fw-bold m-0">
												<?=$runa['category'];?>
											</h3>
										</div>
									</div>
								</div>

								<?php for ($i = 4; $i < 6; $i++): ?>
								<?php $runa = getRune($rune[$i])[0];?>
								<div class="card border-0 bg-dark-subtle mb-2">
									<div class="card-body">
										<?php if ($runa['position'] == 0): ?>
										<div class="d-flex align-items-center">
											<img src="<?=$runa['image'];?>" alt="" style="max-height: 90px;">
											<div class="ms-3 d-flex flex-column align-items-start">
												<h5 class="<?="text-" . $rune_color[$runa['category']] . "-emphasis";?> fw-bold mb-0">
													<?=$runa['name'];?>
												</h5>
											</div>
										</div>
										<?php else: ?>
										<div class="d-flex align-items-center">
											<img src="<?=$runa['image'];?>"
												class="border border-<?=$rune_color[$runa['category']];?> rounded-circle" alt=""
												style="max-height: 64px;">
											<div class="ms-3 d-flex flex-column align-items-start">
												<h5 class="<?="text-" . $rune_color[$runa['category']] . "-emphasis";?> fw-bold mb-0">
													<?=$runa['name'];?>
												</h5>
											</div>
										</div>
										<?php endif;?>
									</div>
								</div>
								<?php endfor;?>
							</div>
						</div>

						<div class="card border-0 bg-dark-subtle">
							<div class="card-body">
								<h5 class="text-body-emphasis fw-bold mb-4">
									Bonus
								</h5>
								<div class="d-flex align-items-center mb-2">
									<img
										src="https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsAdaptiveForceIcon.webp"
										alt="" class="rounded-circle bg-body me-2">
									<span class="fw-semibold">
										<?=$data["sBonus"][0];?>
									</span>
								</div>
								<div class="d-flex align-items-center mb-2">
									<img
										src="https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsAdaptiveForceIcon.webp"
										alt="" class="rounded-circle bg-body me-2">
									<span class="fw-semibold">
										<?=$data["sBonus"][1];?>
									</span>
								</div>
								<div class="d-flex align-items-center mb-2">
									<img
										src="https://static.bigbrain.gg/assets/lol/riot_static/12.11.1/img/perk-images/StatMods/StatModsAdaptiveForceIcon.webp"
										alt="" class="rounded-circle bg-body me-2">
									<span class="fw-semibold">
										<?=$data["sBonus"][2];?>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-4">
					<div class="card border-0 bg-dark-subtle mb-2">
						<div class="card-body">
							<h5 class="text-body-emphasis fw-bold mb-4">
								Summoners
							</h5>


							<div class="d-flex align-items-center mb-2">
								<img src="<?=getImage("image", "summoner", "summoner_id", "" . $data["summoner"]["one"]) . "";?>" alt=""
									class="rounded bg-body me-2">
								<img src="<?=getImage("image", "summoner", "summoner_id", "" . $data["summoner"]["two"]) . "";?>" alt=""
									class="rounded bg-body me-2">
							</div>
						</div>
					</div>

					<div class="card border-0 bg-dark-subtle">
						<div class="card-body">
							<h5 class="text-body-emphasis fw-bold mb-4">
								Ordine Abilità
							</h5>


							<div class="d-flex justify-content-between align-items-center mb-2 flex-wrap">
								<?php for ($i = 0; $i < 5; $i++): ?>
								<div class="flex-fill">
									<h4 class="badge bg-info-subtle p-3 px-4 font-monospace fw-bold fs-6">
										<?=$data["spell"][$i];?>
									</h4>
								</div>
								<?php endfor;?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-12">
					<div class="card border-0 bg-dark-subtle h-100">
						<div class="card-body">
							<h5 class="text-body-emphasis fw-bold mb-4">
								Build Consigliata
							</h5>


							<div class="d-flex justify-content-around flex-wrap">
								<div class="mb-3">
									<h6 class="text-body fw-bold mb-2">
										Start Item
									</h6>
									<img src="<?=getImage("image", "item", 'item_id', "" . $data["item"][0]);?>" alt="" class="rounded m-1">
									<img src="<?=getImage("image", "item", 'item_id', "" . $data["item"][1]);?>" alt="" class="rounded m-1">
								</div>

								<div class="mb-3">
									<h6 class="text-body fw-bold mb-2">
										Stivali
									</h6>
									<img src="<?=getImage("image", "item", 'item_id', "" . $data["item"][2]);?>" alt="" class="rounded m-1">
								</div>

								<div class="mb-3">
									<h6 class="text-body fw-bold mb-2">
										Mitico
									</h6>
									<img src="<?=getImage("image", "item", 'item_id', "" . $data["item"][3]);?>" alt="" class="rounded m-1">
								</div>

								<div class="mb-3">
									<h6 class="text-body fw-bold mb-2">
										Build
									</h6>
									<?php for ($i = 4; $i < 8; $i++): ?>
									<img src="<?=getImage("image", "item", 'item_id', "" . $data["item"][$i]);?>" alt="" class="rounded m-1">
									<?php endfor;?>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>




			<?php parse_str(parse_url($trollpick[0]['uncut'])['query'], $out);?>
			<iframe height="180" width="320" src="<?="https://www.youtube.com/embed/" . $out['v'];?>"
				title="YouTube video player" frameborder="0"
				allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
				allowfullscreen class="rounded mt-5"></iframe>
		</div>
		<?php include "includes/components/structure/main/bottom.php";?>
	</div>
</body>

</html>