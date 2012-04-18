<?php
	if( $this->params["action"] == "myfans" || $this->params["action"] == "public_fans" ) {
		$this->passedArgs['anchor'] = 'htmlBody';		
	}
	else {
		$this->passedArgs['anchor'] = 'result2';
	}
	$paginator->options( array( 'update' => 'result2', "url" => $this->passedArgs ) );
?>

<!-- お知らせ一覧 -->
<div class="pageMoveBox">
<div class="pageMoveBox-inner">
	<ul class="pageMove">
		<li class="prev"><?php echo $paginator->prev( '前へ' );?></li>
		<?php echo $paginator->numbers( array( 'modulus' => 4, "separator"=>"", "tag" => "li", "class" => "num" ) ); ?>
		<li class="next"><?php echo $paginator->next( '次へ' );?></li>
		<li>（全<?php echo number_format( $paginator->counter( array( "format" => "%count%" ) ) );?>人）</li>

	</ul>
</div>
</div>

<?php //echo $this->element( "sql_dump" );?>
<script type="text/javascript">
	var $tempListTypeH = jQuery('.pageSettingBox .kuchikomiList .listType').height();
	var $tempPageMoveH = jQuery('.pageSettingBox .kuchikomiList .pageMove').height();
	var $tempKuchikomiListH = ( $tempListTypeH > $tempPageMoveH ) ? $tempListTypeH: $tempPageMoveH;
	
	var $tempPageMoveLongH = ( jQuery(".pageSettingBox .pageMove-long").size() ) ? jQuery(".pageSettingBox .pageMove-long").height(): null;
	$tempKuchikomiListH = ( $tempKuchikomiListH > $tempPageMoveLongH ) ? $tempKuchikomiListH: $tempPageMoveLongH;
	if( jQuery(".pageSettingBox .pageMove-long").size() ){
		jQuery('.pageSettingBox .kuchikomiList .listType-inner').css("padding-top","11px");
	}
	
	jQuery('.pageSettingBox .kuchikomiList .listType').css("height",$tempKuchikomiListH+'px');
	jQuery('.pageSettingBox .kuchikomiList .pageMove').css("height",$tempKuchikomiListH+'px');
	jQuery('.pageSettingBox .pageMove-long').css("height",$tempKuchikomiListH+'px');
</script>