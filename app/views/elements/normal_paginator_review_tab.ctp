<?php $paginator->options( array( "url" => $this->passedArgs ) );?>

<!-- 検索・一覧 -->
<div class="pageSettingBox" style="float:left; background:url(/common/images/contents/reviewprofilesetting_bg_0003.gif) no-repeat scroll 0 0 transparent">
<div class="pageSettingBox-inner">
<div class="pageSettingBox-pd clr">
	<div id="pageSettingBoxInkuchikomiList" class="kuchikomiList2 clr">
				<ul class="listType">
					<?php if(empty($sortModel)){?>
					<li class="first"><img src="/common/images/contents/txt_0001.gif" alt="並び替え" width="47" height="11" class="inline"></li><?php if( ( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.review_time' && $this->passedArgs['direction'] == 'desc' ) || !( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) ) ): ?><li class="second">新しい順</li><?php else: ?><li class="second" style="padding:11px 0px 12px 5px;"><?php echo $paginator->sort( "新しい順", "Review.review_time", array( "model"=>"Review", "direction" => "desc" ) );?></li><?php endif;?><?php if( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.review_time' && $this->passedArgs['direction'] == 'asc' ): ?><li><a style="text-decoration:none; color:#666666;">古い順</a></li><?php else: ?><li><?php echo $paginator->sort( "古い順", "Review.review_time", array( "model"=>"Review", "direction" => "asc" ) );?></li><?php endif;?><?php if( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.saatisfaction' && $this->passedArgs['direction'] == 'desc' ): ?><li><a style="text-decoration:none; color:#666666;">満足度が高い順</a></li><?php else: ?><li><?php echo $paginator->sort( "満足度が高い順", "Review.saatisfaction", array( "model"=>"Review", "direction" => "desc" ) );?></li><?php endif;?><?php if( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.reference' && $this->passedArgs['direction'] == 'desc' ): ?><li><a style="text-decoration:none; color:#666666;">参考になった順</a></li><?php else: ?><li><?php echo $paginator->sort( "参考になった順", "Review.reference", array( "model"=>"Review", "direction" => "desc" ) );?></li><?php endif;?>
				    <?php }else{?>
				    <li class="first"><img src="/common/images/contents/txt_0001.gif" alt="並び替え" width="47" height="11" class="inline"></li><?php if( ( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.review_time' && $this->passedArgs['direction'] == 'desc' ) || !( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) ) ): ?><li class="second">新しい順</li><?php else: ?><li class="second" style="padding:11px 0px 12px 5px;"><?php echo $paginator->sort( "新しい順", "Review.review_time", array( "model"=>"Ssmallcategory", "direction" => "desc" ) );?></li><?php endif;?><?php if( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.review_time' && $this->passedArgs['direction'] == 'asc' ): ?><li><a style="text-decoration:none; color:#666666;">古い順</a></li><?php else: ?><li><?php echo $paginator->sort( "古い順", "Review.review_time", array( "model"=>"Ssmallcategory", "direction" => "asc" ) );?></li><?php endif;?><?php if( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.saatisfaction' && $this->passedArgs['direction'] == 'desc' ): ?><li><a style="text-decoration:none; color:#666666;">満足度が高い順</a></li><?php else: ?><li><?php echo $paginator->sort( "満足度が高い順", "Review.saatisfaction", array( "model"=>"Ssmallcategory", "direction" => "desc" ) );?></li><?php endif;?><?php if( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.reference' && $this->passedArgs['direction'] == 'desc' ): ?><li><a style="text-decoration:none; color:#666666;">参考になった順</a></li><?php else: ?><li><?php echo $paginator->sort( "参考になった順", "Review.reference", array( "model"=>"Ssmallcategory", "direction" => "desc" ) );?></li><?php endif;?>
				    <?php } ?>
				</ul>
				<ul class="pageMove">
					<li class="prev"><?php echo $paginator->prev( '前へ' );?></li>
					<?php echo $paginator->numbers( array( 'modulus' => "4", "separator"=>"", "tag" => "li class='num'") ); ?>
					<li class="next"><?php echo $paginator->next( '次へ' );?></li>
					<li class="numCase">（全<?php echo number_format( $paginator->counter( array( "format" => "%count%" ) ) );?>件）</li>
				</ul>
	<!-- /kuchikomiList -->
	</div>
<!-- /pageSettingBox -->
</div>
</div>
</div>
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