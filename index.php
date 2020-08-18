<?php
function critical_css($path = '/assets/dist/critical.css') {
	$critical = __DIR__ . $path;

	if ( file_exists($critical) ) {
		$critical_css = file_get_contents($critical);

		echo '<style type="text/css" id="critical-css">' . $critical_css . '</style>';
	}
}

function print_list_items($count) {
	for ($i = 0; $i < $count; $i++) {
		echo '<li></li>';
	}
}

function print_grid_items($count) {
	for ($i = 0; $i < $count; $i++) {
		echo '<span></span>';
	}
}

function print_tree() {
	echo '<div class="tree__top"></div>';
	echo '<div class="tree__middle"></div>';
	echo '<div class="tree__bottom"></div>';
}

function print_part($name, $count) {
	for ($i = 0; $i < $count; $i++) {
		echo '<div class="' . $name . ' ' . $name . '--' . ($i + 1) . '"></div>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<?php critical_css(); ?>

	<link rel="manifest" href="manifest.json">
</head>
<body>
	<html-head-component src="./assets/scripts/meta.json" hidden></html-head-component>

	<div class="wrapper">
		<div id="got" class="scene">
			<?php include_once('components/jon-snow.php'); ?>

			<?php include_once('components/white-walker.php'); ?>

			<?php include_once('components/clouds.php'); ?>

			<?php include_once('components/sky.php'); ?>

			<?php include_once('components/snowflakes.php'); ?>

			<?php include_once('components/wall.php'); ?>

			<?php include_once('components/landscape.php'); ?>
		</div>

		<social-links style="color: #3d6b7a; display: block;"></social-links>
	</div>

	<script src="assets/dist/app.js"></script>
</body>
</html>
