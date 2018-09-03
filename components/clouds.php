<div class="clouds">
	<?php
	$clouds = ['left-top', 'left-middle', 'left-bottom', 'right-top', 'right-bottom'];
	
	foreach ($clouds as $cloud) {
		echo '<div class="cloud cloud--' . $cloud . '"></div><!-- /.cloud -->';
	}
	?>
</div><!-- /.clouds -->