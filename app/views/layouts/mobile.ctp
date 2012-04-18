<!DOCTYPE HTML PUBLIC "-//W3C//DTD Compact HTML 1.0 Draft//EN">
<?php
  // Copyright 2009 Google Inc. All Rights Reserved.
  global $GA_ACCOUNT, $GA_PIXEL; //PHP5の仕様によりeAが追加
  $GA_ACCOUNT = "MO-18173572-4";
  $GA_PIXEL = "/ga.php";

  function googleAnalyticsGetImageUrl() {
    global $GA_ACCOUNT, $GA_PIXEL;
    $url = "";
    $url .= $GA_PIXEL . "?";
    $url .= "utmac=" . $GA_ACCOUNT;
    $url .= "&utmn=" . rand(0, 0x7fffffff);
    //$referer = $_SERVER["HTTP_REFERER"];
	$referer = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : NULL;
    $query = $_SERVER["QUERY_STRING"];
    $path = $_SERVER["REQUEST_URI"];
    if (empty($referer)) {
      $referer = "-";
    }
    $url .= "&utmr=" . urlencode($referer);
    if (!empty($path)) {
      $url .= "&utmp=" . urlencode($path);
    }
    $url .= "&guid=ON";
    return str_replace("&", "&amp;", $url);
  }
?>
<html>
<head>
<meta name="chtml" http-equiv="content-type" content="text/html; charset=Shift_JIS">
<title><?php echo h( $title_for_layout ); ?></title>

<meta name="keywords" content="<?php echo h( $keywords_for_layout ); ?>">
<meta name="description" content="<?php echo h( $description_for_layout ); ?>">
</head>
<body bgcolor="#ffffff" vlink="#999999" link="#0096FF">





<?php echo $content_for_layout; ?>

<!-- footer -->
<hr color="#79cfc4">
<font size="1" color="#616161" >
<font color="#79cfc4" >● </font><a href="<?php echo h(Configure::read( "local.master.website_m" ))?>?OSSN=<?php echo $OSSN ?>">ORBISTOPに戻る</a><br >
<font color="#79cfc4" >● </font><a href="<?php echo h(Configure::read( "local.master.website_m" ))?>/Catalog/basket.asp?OSSN=<?php echo $OSSN ?>">買い物ｶｺﾞを見る</a><br >
<font color="#79cfc4" >● </font><a href="<?php echo h(Configure::read( "local.master.website_m" ))?>/mypage?OSSN=<?php echo $OSSN ?>">ﾏｲﾍﾟｰｼﾞへ</a><br >
<font color="#79cfc4" >● </font><a href="mailto:?subject=ORBIS オンラインショップ MOBILE&body=<?php echo h(Configure::read( "local.master.website_m" ))?>/">このｻｲﾄを友達に教える</a><br >
</font>
<hr color="#79cfc4">
<center><font size="3" color="#79cfc4" >(C)2012 ORBIS</font></center>
<!-- /footer -->
<?php
  $googleAnalyticsImageUrl = googleAnalyticsGetImageUrl();
  echo '<img src="' . $googleAnalyticsImageUrl . '" />';?>
</body>
</html>

