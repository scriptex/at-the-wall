<div class="clouds">
<?php
$clouds = ['left-top', 'left-middle', 'left-bottom', 'right-top', 'right-bottom'];
foreach ($clouds as $cloud) {
	?>
	<div class="cloud cloud--<?php echo $cloud?>"></div><!-- /.cloud -->
	<?php
}
?>
</div><!-- /.clouds -->