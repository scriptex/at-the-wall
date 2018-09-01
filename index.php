<?php
function critical_css($path = '/assets/dist/critical.css') {
	$critical = __DIR__ . $path;

	if ( file_exists($critical) ) {
		$critical_css = file_get_contents($critical);

		echo '<style type="text/css" id="critical-css">' . $critical_css . '</style>';
	}
}
?>

<!DOCTYPE html>
<html lang="en" manifest="at-the-wall.appcache">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="A Game of Thrones scene coded in HTML and CSS only" />

	<title>At the Wall | A Game of Thrones scene in CSS and HTML</title>

	<!--
	For more info about the favicons and meta tags below see
	https://github.com/audreyr/favicon-cheat-sheet
	-->
	<link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicon/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="assets/images/favicon/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="assets/images/favicon/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="assets/images/favicon/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="assets/images/favicon/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="assets/images/favicon/favicon-128.png" sizes="128x128" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.ico" />
	<meta name="application-name" content="At the Wall"/>
	<meta name="msapplication-TileColor" content="#000000" />
	<meta name="msapplication-TileImage" content="assets/images/favicon/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="assets/images/favicon/mstile-70x70.png" />
	<meta name="msapplication-square150x150logo" content="assets/images/favicon/mstile-150x150.png" />
	<meta name="msapplication-wide310x150logo" content="assets/images/favicon/mstile-310x150.png" />
	<meta name="msapplication-square310x310logo" content="assets/images/favicon/mstile-310x310.png" />
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
		</div><!-- /#got.scene -->
	</div>

	<script>
		if ('serviceWorker' in navigator) {
			window.addEventListener('load', () => {
				navigator.serviceWorker.register('./service-worker.js');
			});
		}
	</script>
</body>
</html>
