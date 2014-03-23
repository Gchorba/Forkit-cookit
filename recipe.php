<?php
$id_num = $_GET['id'];
$id = "id" . $id_num;

$json_file = file_get_contents("data/recipes.json");
$json_data = json_decode($json_file, true);
?>
<html>
	<head>
		<title><?php echo "Fork It, Cook It - " . $json_data[$id]["name"]; ?></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
	<?php require('inc/header.php'); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-heading"><h4><?php echo $json_data[$id]['name']; ?></h4></div>
						<div class="panel-body">
							<table class="table">
								<tr>
									<td>Difficulty: <span class="label label-default"><?php echo $json_data[$id]['difficulty']; ?></span></td>
									<td>Author: <span class="label label-default"><a href="<?php echo "profile.php?id=" . $json_data[$id]['author_id']; ?>" style="color: #FFF"><u><?php echo $json_data[$id]['author']; ?><u></a></span></td>
								</tr>
								<tr>
									<td>Forked From: <span class="label label-default"><?php if ($json_data[$id]['parent'] == "None" || $json_data[$id]['parent'] == "") { echo "None"; } else { echo "TODO"; } ?></span></td>
									<td></td>
								</tr>
							</table>							
							<div class="col-md-8">
								<table class="table">
									<thead>
										<th>Amount</th>
										<th>Ingredient</th>
									</thead>
									<?php
										for ($i = 0; $i < $json_data[$id]['num_ingred']; $i++) {
											echo "<tr>\n";
											echo "\t<td>" . $json_data[$id]['ingred_amnt' . $i] . "</td>\n";
											echo "\t<td>" . $json_data[$id]['ingred_name' . $i] . "</td>\n";
											echo "</tr>\n";
										}
									?>
								</table>
							</div>
							<div class="col-md-4">
								<table class="table">
									<thead>
										<th>Equipment</th>
									<thead>
									<?php
										for ($i = 0; $i < $json_data[$id]['num_equip']; $i++) {
											echo "<tr>\n";
											echo "\t<td>" . $json_data[$id]['equip' . $i] . "</td>\n";
											echo "</tr>\n";
										}
									?>
								</table>
							</div>
						</div>
						<ul class="list-group">
							<?php
								for ($i = 0; $i < $json_data[$id]['num_instruct']; $i++) {
									echo "<li class=\"list-group-item\"><b>" . $json_data[$id]['instruct_id' . $i] . "</b> " . $json_data[$id]['instruct_text' . $i] . "</li>\n";
								}
							?>
						</ul>
					</div>
				</div>
				<div class="col-md-3" align="center">
					<div class="btn-group">
						<button type="button" class="btn btn-default" href="#">Fork</button>
						<button type="button" class="btn btn-default" href="#">Star</button>
						<button type="button" class="btn btn-default" href="#">Rate</button>
						<button type="button" class="btn btn-default" href="#">Share</button>
					</div>
					<br /><br />
					<a href="forkedupitalian.php" class="btn btn-danger btn-block">Forked Up?</a>
				</div>
			</div>
		</div>
	</body>
</html>