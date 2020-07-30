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
	<meta name="description" content="A Game of Thrones scene coded in HTML and CSS only" />

	<title>At the Wall | A Game of Thrones scene in CSS and HTML</title>

	<link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="favicons/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="favicons/favicon-128.png" sizes="128x128" />
	<link rel="shortcut icon" type="image/x-icon" href="favicons/favicon.ico" />
	<meta name="application-name" content="At the Wall"/>
	<meta name="msapplication-TileColor" content="#000000" />
	<meta name="msapplication-TileImage" content="favicons/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="favicons/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="favicons/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="favicons/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="favicons/mstile-310x310.png" />
	<meta name="msapplication-config" content="config.xml" />
	<meta name="theme-color" content="#000000" />

	<link rel="manifest" href="manifest.json" />

	<?php critical_css(); ?>

	<link rel="stylesheet" href="assets/dist/app.css" />
</head>
<body>
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
