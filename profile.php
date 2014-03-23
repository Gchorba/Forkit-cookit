<?php
$id_num = $_GET['id'];
$id = "id" . $id_num;

$json_file = file_get_contents("data/profiles.json");
$json_data = json_decode($json_file, true);
?>

<html>
	<head>
		<title><?php echo "Fork It, Cook It - " . $json_data[$id]['username']; ?></title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">	
	<?php require('inc/header.php'); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="<?php echo "data/img/profpic/" . $json_data[$id]['username'] . ".png"; ?>" 	height="225" width="225" class="img-circle"></img>
							<br />
							<h3><?php echo $json_data[$id]['name']; ?></h3>
							<h5><?php echo $json_data[$id]['username']; ?></h5>
							<h5><?php echo $json_data[$id]['age']; ?></h5>
							<h5><?php echo $json_data[$id]['location']; ?></h5>
							<h5><?php echo "<a href=\"" . $json_data[$id]['website'] . "\">" . $json_data[$id]['website_display'] . "</a>"; ?></h5>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="list-group">
								<?php
									if ($json_data[$id]['num_recipes'] > 0) {
										for ($i = 0; $i < $json_data[$id]['num_recipes']; $i++) {
											echo "<a href=\"recipe.php?id=" . $json_data[$id]['rec_id' . $i] . "\" class=\"list-group-item\">\n";
											echo "\t<h4 class=\"list-group-item-heading\">" . $json_data[$id]['rec_name' . $i] . "</h4>\n";
											echo "\t<p class=\"list-group-item-text\">" . $json_data[$id]['rec_desc' . $i] . "</h4>\n";
											echo "</a>\n";
										}
									} else {
										echo "<h3 align=\"center\">Sorry, this user hasn't posted any recipes.</h3>";
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>