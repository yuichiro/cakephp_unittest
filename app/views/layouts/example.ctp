<?php echo '<?xml version="1.0" encoding="UTF-8"?>'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<title><?php echo h( $title_for_layout ); ?></title>
<meta name="keywords" content="<?php echo h( $keywords_for_layout ); ?>" />
<meta name="desctiption" content="<?php echo h( $description_for_layout ); ?>" />
<?php 
	echo $javascript->link( array( 'jquery', 'prototype' ) );
?>
</head>
<body>
<!-- #pop_window -->
<div id="pop_window">
  <!-- #header_end -->
  <!-- #conrent -->
			<?php $session->flash(); ?>
			<?php echo $content_for_layout; ?>
  <!-- #conrent_end -->
</div>
<!-- #pop_window_end -->
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
