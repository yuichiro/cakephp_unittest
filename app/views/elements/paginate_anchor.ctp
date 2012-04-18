<?php if( !empty( $anchor ) ):?>
<script type="text/javascript">
	if( navigator.userAgent.toLowerCase().indexOf("chrome") != -1 ) {
		window.location.hash = "#<?php echo $anchor;?>";
		window.location.hash = "";
	} else {
		window.location.hash = "#<?php echo $anchor;?>";
	}
</script>
<?php endif;?>