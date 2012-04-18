<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
	<meta http-equiv="content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="content-script-type" content="text/javascript">
	<meta http-equiv="content-style-type" content="text/css">

	<title><?php echo h( $title_for_layout ); ?></title>

	<meta name="keywords" content="<?php echo h( $keywords_for_layout ); ?>">
	<meta name="description" content="<?php echo h( $description_for_layout ); ?>">

	<link rel="stylesheet" type="text/css" href="/common/css/import.css" media="all">
	<script language="javascript" type="text/javascript" src="/common/js/jquery-1.4.2.js"></script>
	<script language="javascript" type="text/javascript" src="/common/js/jquery.browser.min.js"></script>
	<script language="javascript" type="text/javascript" src="/common/js/jquery.easing.1.3.js"></script>
	<script language="javascript" type="text/javascript" src="/common/js/jquery.scrollTo.js"></script>
	<script language="javascript" type="text/javascript" src="/common/js/jquery.accessible-news-slider.js"></script>

	<script language="javascript" type="text/javascript" src="/common/js/jquery.upload-1.0.2.js"></script>

	<link rel="stylesheet" type="text/css" href="/common/ui-lightness/jquery-ui-1.8.2.custom.css" media="all">
	<script language="javascript" type="text/javascript" src="/common/js/jquery-ui-1.8.2.custom.min.js"></script>

	<script language="javascript" type="text/javascript" src="/common/js/common.js"></script>

	<link rel="stylesheet" type="text/css" href="/contents/common/css/common.css" media="all">

	<?php if ( !empty($add_rtoaster_js) ) {?>
	<script type="text/javascript" src="//rt.rtoaster.jp/Rtoaster.js"></script>
	<script type="text/javascript">
	Rtoaster.init("RTA-5589-1c1c57811023");
	Rtoaster.track();
	</script>
	<?php } ?>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-18173572-2']);
		  _gaq.push(['_trackPageview']);
		
		(function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
	</script>
	<?php 
		echo $javascript->link( array( 'prototype', 'common_1', 'imgov' ) );
	?>
</head>
<body class="short">
<a name="pagetop" id="pagetop"></a>

<noscript>
<!-- noscriptContainer -->
<div id="noscriptContainer">
<div class="jsNone">
<p><span>�����p�̊��ł�JavaScript�̐ݒ肪����ɂȂBĂ��܂��B</span><br>���T�C�g�ⲗ����������ɂ̓u���E�U�̐ݒ�ŁAJavaScript��L��ɐݒ肷��K�v���������܂��B</p>
</div>
</div>
<!-- /noscriptContainer -->
</noscript>

<!-- #conrent -->
<?php $session->flash(); ?>
<?php echo $content_for_layout; ?>
<!-- #conrent_end -->

<!-- footer -->
<?php include( ROOT . DS . WEBROOT_DIR . "/common/include/footer.inc" ); ?>
<!-- /footer -->

<?php echo $this->element('sql_dump'); ?>

</body>
</html>


