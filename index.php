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
	echo '<div class="tree__top"></div><!-- /.tree__top -->';
	echo '<div class="tree__middle"></div><!-- /.tree__middle -->';
	echo '<div class="tree__bottom"></div><!-- /.tree__bottom -->';
}

function print_part($name, $count) {
	for ($i = 0; $i < $count; $i++) {
		echo '<div class="' . $name . ' ' . $name . '--' . ($i + 1) . '"></div>';
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

	<!-- 12.9" iPad Pro Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2048x2732.png"
		media="(device-width: 2048px) and (device-height: 2732px) and (orientation: portrait)"
	/>

	<!-- 12.9" iPad Pro Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2732x2048.png"
		media="(device-width: 2732px) and (device-height: 2048px) and (orientation: landscape)"
	/>

	<!--  11" iPad Pro Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1668x2388.png"
		media="(device-width: 1668px) and (device-height: 2388px) and (orientation: portrait)"
	/>

	<!--  11" iPad Pro Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2388x1668.png"
		media="(device-width: 2388px) and (device-height: 1668px) and (orientation: landscape)"
	/>

	<!-- 10.5" iPad Pro Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1668x2224.png"
		media="(device-width: 1668px) and (device-height: 2224px) and (orientation: portrait)"
	/>

	<!-- 10.5" iPad Pro Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2224x1668.png"
		media="(device-width: 2224px) and (device-height: 1668px) and (orientation: landscape)"
	/>

	<!--  9.7" iPad Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1536x2048.png"
		media="(device-width: 1536px) and (device-height: 2048px) and (orientation: portrait)"
	/>

	<!--  9.7" iPad Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2048x1536.png"
		media="(device-width: 2048px) and (device-height: 1536px) and (orientation: landscape)"
	/>

	<!--7.9" iPad mini 4 Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1536x2048.png"
		media="(device-width: 1536px) and (device-height: 2048px) and (orientation: portrait)"
	/>

	<!--7.9" iPad mini 4 Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2048x1536.png"
		media="(device-width: 2048px and (device-height: 1536px) and (orientation: landscape)"
	/>

	<!--  iPhone XS Max Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1242x2688.png"
		media="(device-width: 1242px and (device-height: 2688px) and (orientation: portrait)"
	/>

	<!--  iPhone XS Max Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2688x1242.png"
		media="(device-width: 2688px) and (device-height: 142px) and (orientation: landscape)"
	/>

	<!--  iPhone XS Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1125x2436.png"
		media="(device-width: 1125px) and (device-height: 236px) and (orientation: portrait)"
	/>

	<!--  iPhone XS Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2436x1125.png"
		media="(device-width: 2436px) and (device-height: 1125px) and (orientation: landscape)"
	/>

	<!--  iPhone XR Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-828x1792.png"
		media="(device-width: 828px) and (device-height: 192px) and (orientation: portrait)"
	/>

	<!--  iPhone XR Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1792x828.png"
		media="(device-width: 1792px) and (device-height: 28px) and (orientation: landscape)"
	/>

	<!--  iPhone X Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1125x2436.png"
		media="(device-width: 1125px) and (device-height: 236px) and (orientation: portrait)"
	/>

	<!--  iPhone X Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2436x1125.png"
		media="(device-width: 2436px and (device-height: 1125px) and (orientation: landscape)"
	/>

	<!--  iPhone 8 Plus Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1242x2208.png"
		media="(device-width: 1242px and (device-height: 2208px) and (orientation: portrait)"
	/>

	<!--  iPhone 8 Plus Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2208x1242.png"
		media="(device-width: 2208px) and (device-height: 1242px) and (orientation: landscape)"
	/>

	<!--  iPhone 8 Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-750x1334.png"
		media="(device-width: 750px) and (device-height: 134px) and (orientation: portrait)"
	/>

	<!--  iPhone 8 Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1334x750.png"
		media="(device-width: 1334px and (device-height: 750px) and (orientation: landscape)"
	/>

	<!--  iPhone 7 Plus Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1242x2208.png"
		media="(device-width: 1242px and (device-height: 2208px) and (orientation: portrait)"
	/>

	<!--  iPhone 7 Plus Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2208x1242.png"
		media="(device-width: 2208px) and (device-height: 1242px) and (orientation: landscape)"
	/>

	<!--  iPhone 7 Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-750x1334.png"
		media="(device-width: 750px) and (device-height: 134px) and (orientation: portrait)"
	/>

	<!--  iPhone 7 Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1334x750.png"
		media="(device-width: 1334px and (device-height: 750px) and (orientation: landscape)"
	/>

	<!--  iPhone 6s Plus Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1242x2208.png"
		media="(device-width: 1242px and (device-height: 2208px) and (orientation: portrait)"
	/>

	<!--  iPhone 6s Plus Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-2208x1242.png"
		media="(device-width: 2208px) and (device-height: 1242px) and (orientation: landscape)"
	/>

	<!--  iPhone 6s Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-750x1334.png"
		media="(device-width: 750px) and (device-height: 134px) and (orientation: portrait)"
	/>

	<!--  iPhone 6s Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1334x750.png"
		media="(device-width: 1334px) and (device-height: 50px) and (orientation: landscape)"
	/>

	<!--  iPhone SE Portrait -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-640x1136.png"
		media="(device-width: 640px) and (device-height: 136px) and (orientation: portrait)"
	/>

	<!--  iPhone SE Landscape -->
	<link
		rel="apple-touch-startup-image"
		href="launch-screens/launch-screen-1136x640.png"
		media="(device-width: 1136px) and (device-height: 640px) and (orientation: landscape)"
	/>

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
