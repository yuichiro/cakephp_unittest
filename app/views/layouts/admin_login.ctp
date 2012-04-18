<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
	<meta http-equiv="content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="content-script-type" content="text/javascript">
	<meta http-equiv="content-style-type" content="text/css">
	
	<title><?php echo h( $title_for_layout ); ?></title>

	<meta name="keywords" content="<?php echo h( $keywords_for_layout ); ?>" />
	<meta name="desctiption" content="<?php echo h( $description_for_layout ); ?>" />


	<link rel="stylesheet" type="text/css" href="/_admin/common/css/import.css" media="all">
	<script type="text/javascript" src="/_admin/common/js/jquery.js"></script>
	<script type="text/javascript" src="/_admin/common/js/import.js"></script>

	<link type="text/css" href="/_admin/common/ui-lightness/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
	<link type="text/css" href="/_admin/common/ui-lightness/jquery-ui-timepicker.css" rel="stylesheet" />
	<script type="text/javascript" src="/_admin/common/js/jquery-ui-1.8.2.custom.js"></script>

	<script type="text/javascript" src="/_admin/common/js/jquery-ui-timepicker-addon-0.5.js"></script>
	<script type="text/javascript" src="/_admin/common/js/jquery-ui-timepicker-setting.js"></script>
</head>
<body>
<a name="pageTop" id="pageTop"></a>
<div id="wrap">
<!-- HEADER INC -->
<?php echo $this->element( "/_admin/include/header" );?>
<!-- END INC -->

<!-- #conrent -->
<?php $session->flash(); ?>
<?php echo $content_for_layout; ?>
<!-- #conrent_end -->

<div id="bottomWrap">
<!-- FOOTER INC -->

<?php echo $this->element( "/_admin/include/footer" );?>
<!-- END INC -->
</div>


<!-- /wrap -->
</div>
</body>
</html>
