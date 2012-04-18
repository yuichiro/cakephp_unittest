<?php echo $this->element( "paginate_anchor" );?>

<style type="text/css">
	#mainContents div.impressionItem div.usersItemData div.itemdata ul.icon li.season {
	margin-right:6px;
	}
	#mainContents div.impressionItem div.usersItemData div.itemdata ul.icon li {
	font-size:12px;
	line-height:100%;
	}
</style>
<?php
    if(!isset($review_id)){
       echo $this->element( 'front_product' );
    } else {
       echo $this->element( 'front_product2' );
	}
?>

<?php if( !empty( $this->passedArgs['use_purpose'] ) ):?>
<!-- 使用目的 -->
<script type="text/javascript">
	var use_purposes = "<?php echo $this->passedArgs['use_purpose'];?>";
	arr = use_purposes.split( "," ); 
	jQuery.each( arr, function( index, entry ) {
		jQuery( ".formPurpose :checkbox[value='"+entry+"']" ).attr( "checked", true );
	} );	
</script>
<?php endif;?>

<?php if( !empty( $this->passedArgs['birth'] ) ):?>
<!-- 年代 -->
<script type="text/javascript">
	var births = "<?php echo $this->passedArgs['birth'];?>";
	arr = births.split( "," ); 
	jQuery.each( arr, function( index, entry ) {
		jQuery( ".formAge :checkbox[value='"+entry+"']" ).attr( "checked", true );
	} );	
</script>
<?php endif;?>

<?php if( !empty( $this->passedArgs['orbis_use_date'] ) ):?>
<!-- オルビス歴 -->
<script type="text/javascript">
	var orbis_use_dates = "<?php echo $this->passedArgs['orbis_use_date'];?>";
	arr = orbis_use_dates.split( "," ); 
	jQuery.each( arr, function( index, entry ) {
		jQuery( ".formHistry :checkbox[value='"+entry+"']" ).attr( "checked", true );
	} );	
</script>
<?php endif;?>

<?php if( !empty( $this->passedArgs['skin_type'] ) ):?>
<!-- 肌質 -->
<script type="text/javascript">
	var skin_types = "<?php echo $this->passedArgs['skin_type'];?>";
	arr = skin_types.split( "," ); 
	jQuery.each( arr, function( index, entry ) {
		jQuery( ".formSkintype :checkbox[value='"+entry+"']" ).attr( "checked", true );
	} );
</script>
<?php endif;?>

<?php if( !empty( $this->passedArgs['use_season'] ) ):?>
<!-- 使用シーズン -->
<script type="text/javascript">
	var use_seasons = "<?php echo $this->passedArgs['use_season'];?>";
	arr = use_seasons.split( "," ); 
	jQuery.each( arr, function( index, entry ) {
		jQuery( ".formUseSeason :checkbox[value='"+entry+"']" ).attr( "checked", true );
	} );	
</script>
<?php endif;?>

<?php if( !empty( $this->passedArgs['keyword'] ) ):?>
<script type="text/javascript">
	var keywords = "<?php echo urldecode( $this->passedArgs['keyword'] );?>";
	jQuery( "#ReviewKeyword" ).val( keywords );
</script>
<?php endif;?>
<?php if( $paginator->current( 'Review' ) == 1 ):?>
<?php if( !empty( $bestreviewdata  ) ):?>
<?php if ( ( !empty($reviewDatas ) ) && count( $reviewDatas ) >= 3 && empty( $bestreview_disply )):?>
<div class="impressionItem">
<div class="best">
<div class="best-btm">
	<div class="mkr-best">
		<img src="/common/images/contents/impitem_mkr_best.gif" alt="この商品のベストクチコミ" width="103" height="58" class="ping">
	</div>
	<div class="title clr">
		<div class="itemPic">
			<?php if( !empty( $bestreviewdata['Product']['small40photoimg'] ) ): ?><img src="<?php echo Configure::read( "local.master.website" ) . $bestreviewdata['Product']['small40photoimg'];?>" alt="<? echo h($bestreviewdata['Product']['productname']);?>" width="40" height="40"><?php endif;?><br>
		</div>
		<div class="itemTxt">
			<p class="date">
				投稿日：
				<?php 
				    if( !empty( $bestreviewdata['Review']['review_time'] ) ){
				    	$commit_date = date( "Y年m月d日", strtotime( $bestreviewdata['Review']['review_time'] ) );
						echo $commit_date;
				    }
				?>
			</p>
			<h2>
				<?php 
					if( !empty( $bestreviewdata['0']['productname_class'] ) ) echo h( str_replace( '　　', '　', rtrim( $bestreviewdata['0']['productname_class'], '　' ) ) );
				?>
			</h2>			
		</div>
	<!-- /title -->
	</div>
	

	<div class="simpleInfo clr">
		<div class="rating" style="text-align:left;">
			<img src="/common/images/contents/txt_0003.gif" alt="満足度：" width="39" height="11" class="inline txt"><?php if( empty( $bestreviewdata['Review']['saatisfaction'] ) )  $bestreviewdata['Review']['saatisfaction'] = 0 ;  echo Review::formatSatisfaction( $bestreviewdata['Review']['saatisfaction'], 1 ); ?><br/>
		</div>
		<p class="subData"><span class="nowrap">投稿時：</span>
			<?php
				$show_arr = array();
				/** **代前半(後半) */
				$contributionAge = Review::formatContributionAge( $bestreviewdata['Review']['review_time'], $bestreviewdata['Review']['birth'] );
				if( !empty( $contributionAge ) )array_push( $show_arr, $contributionAge );
				
				/** 肌質 */
				$skin_type = Review::getSkinTypes();
				if( !empty( $bestreviewdata['Review']['skin_type'] ) && !empty( $skin_type[$bestreviewdata['Review']['skin_type']] ) ){
					array_push( $show_arr, $skin_type[$bestreviewdata['Review']['skin_type']] );
				}
				
				/** オルビス歴 */
				$useYear = Review::formatUseYear( $bestreviewdata['Review']['review_time'], $bestreviewdata['Review']['orbis_use_date'] );
				if( !empty( $useYear ) ){
					$useYear = 'オルビス歴' . ' ' . $useYear;
					array_push( $show_arr, $useYear );
				} else {
					$useYear = 'オルビス歴' . ' ' . '不明';
					array_push( $show_arr, $useYear );
				}
				
				echo join( "・", $show_arr );
			?>
		</p>
	<!-- /simpleInfo -->
	</div>

	<div class="usersItemData clr">
		<div class="itemdata">
		<div class="itemdata-inner">
			<h5>
			<?php 
					echo h( $bestreviewdata['Review']['title'] );
			?>
			</h5>
			<p class="txt">
				<?php 
					echo Review::emojiToImgPage($bestreviewdata['Review']['body']);
				?>
			</p>
			<p class="purpose">
				<span class="xs nowrap">目的&nbsp;:&nbsp;</span>
				<?php 
					if( !empty( $bestreviewdata['Review']['use_purpose_names'] ) ){
						$use_purpose_array = explode( ' ', $bestreviewdata['Review']['use_purpose_names'] );
			 			foreach( $use_purpose_array as $data ){
			 				echo " <span class='nowrap'>$data</span> ";
			 			}
					}
				?>
			 </p>
			<ul class="icon clr">
				<?php if( $bestreviewdata['Review']['product_type'] == 1 ) :?>
					<li><img src="/common/images/contents/impitem_icon_0101.gif" alt="商品購入" width="61" height="23"></li>
					<?php if( $bestreviewdata['Review']['purchase_frequency'] == 1 ) :?>
					    <li><img src="/common/images/contents/impitem_icon_0103.gif" alt="商品購入" width="61" height="23"></li>
					<? elseif( $bestreviewdata['Review']['purchase_frequency'] == 2 ) :?>
						<li><img src="/common/images/contents/impitem_icon_0102.gif" alt="はじめて" width="61" height="23"></li>
					<? endif; ?>
				<? endif; ?>
				<?php if( $bestreviewdata['Review']['product_type'] == 2 ) :?>
					<li><img src="/common/images/contents/impitem_icon_0100.gif" alt="サンプル" width="61" height="23"></li>
				<? endif; ?>
				<?php 
					$UseSeasons = Review::getUseSeasons();
					if( !empty( $bestreviewdata['Review']['use_season'] ) ){
						$useseason = explode( ",", $bestreviewdata['Review']['use_season'] );
						foreach( $useseason as $key => $season ){
							echo '<li class="season"><img src="/common/images/contents/impitem_icon_010'.($season - 1 + 4).'.gif" width="25" height="24"> </li>';
						}
					}
				?>
			</ul>

			<?php
				$cookie_key = $_SERVER['REMOTE_ADDR'].Review::REFERENCE_COOKIE.$bestreviewdata['Review']['id']; 
				$cookie_key = preg_replace( "/\./", '_', $cookie_key);
			?>
			<div class="vote <?php if( !empty( $_COOKIE["{$cookie_key}"] ) ):?>vote02<?php endif;?>">

					<span id="bestreference<?php echo $bestreviewdata['Review']['id'];?>" <?php if( !empty( $_COOKIE["{$cookie_key}"] ) || ( !empty( $uerinfo_arr['contentsuserid'] ) && !empty( $bestreviewdata['Review']['contents_user_id'] ) && $uerinfo_arr['loginstatus'] == 1 && $uerinfo_arr['userstatus'] == 2 && $uerinfo_arr['contentsuserid'] == $bestreviewdata['Review']['contents_user_id'] ) ):?>style="display:none;"<?php endif;?>>
					<?php if( !empty( $smallcategoryid ) ): ?>
					<?php echo $form->hidden("Review.smallcategoryid", array( 'value' => $smallcategoryid ));?>
					<?php endif; ?>
					<img src="/common/images/contents/impitem_txt_vote.gif" alt="このクチコミは参考になりましたか？" width="150" height="9" class="inline txt">
					<img src="/common/images/contents/impitem_btn_0001.gif" alt="参考になった" style="cursor:pointer;" alt="参考になった" onclick="javascript:ajax_reference( '1', '<?php echo $bestreviewdata['Review']['id'];?>');" class="inline imgOv" />
					<img src="/common/images/contents/impitem_btn_0002.gif" alt="参考にならなかった" class="inline imgOv" onclick="javascript:ajax_reference( '2', '<?php echo $bestreviewdata['Review']['id'];?>');" />
					</span>

					<span id="bestover<?php echo $bestreviewdata['Review']['id'];?>" <?php if( empty( $_COOKIE["{$cookie_key}"] ) ):?>style="display:none;"<?php endif;?>>
						<img src="/common/images/contents/impitem_txt_vote02.gif" alt="ご評価ありがとうございました。" width="171" height="13" class="txt"><br>						
					</span>
				
				<p>このクチコミが参考になった人&nbsp;:&nbsp;&nbsp;<span class="strong big" id="test"><span id="BestreferenceNum<?php echo $bestreviewdata['Review']['id'];?>"><?php echo number_format( $bestreviewdata['Review']['reference'] );?></span>人</span></p>
				
			<!-- /vote -->
			</div>
		<!-- /itemdata -->
		</div>
		</div>
		<div class="subItemdata">
		<div class="subItemdata-inner clr">
			<div class="user clr">
				<a href="<?php echo $html->url( array( "controller" => "mypages", "action" => "public_profile", $bestreviewdata['ContentsUser']['contents_user_id'] ) );?>"  style="text-align: center; width: 60px; display: block; float: left; word-wrap:break-word;"><img src="<?php echo Review::profileImage( $bestreviewdata['ContentsUser']['images'], 0 );?>" alt="<?php echo h($bestreviewdata['ContentsUser']['nickname']);?>" class="face"></a>
				<div class="txt">
					<p class="name" style="word-wrap:break-word; overflow:hidden;"><a href="<?php echo $html->url( array( "controller" => "mypages", "action" => "public_profile", $bestreviewdata['ContentsUser']['contents_user_id'] ) );?>"><?php echo h( $bestreviewdata['ContentsUser']['nickname'] );?></a>さん</p>
					<p class="num">（<?php if( !empty( $bestreviewdata['Review']['contents_user_count'] ) ):?><?php echo number_format( $bestreviewdata['Review']['contents_user_count'] ) . '件';?><?php endif;?>）</p>
					<div class="mvp">
						<a href="#help-popup-memberrank" class="help-popup-open">
							<?php if( $bestreviewdata['ContentsUser']['user_rank_id'] == Review::USE_RANK_ONE ):?>
								<img src="/common/images/contents/icon_rank_mvp.gif" alt="MVP" width="44" height="15">
							<?php elseif( $bestreviewdata['ContentsUser']['user_rank_id'] == Review::USE_RANK_TWO ):?>
								<img src="/common/images/contents/icon_rank_s.gif" alt="S" width="44" height="15">
							<?php elseif( $bestreviewdata['ContentsUser']['user_rank_id'] == Review::USE_RANK_THREE ):?>
								<img src="/common/images/contents/icon_rank_a.gif" alt="A" width="44" height="15">
							<?php elseif( $bestreviewdata['ContentsUser']['user_rank_id'] == Review::USE_RANK_FOUR ):?>
								<img src="/common/images/contents/icon_rank_b.gif" alt="B" width="44" height="15">
							<?php endif;?>
						</a>
						<span class="popImgBase">
							<a href="#" class="popupBlockThisImg">
								<img src="/common/images/contents/dummy_pop.png" alt="" width="103" height="58" class="popStatus ping">
							</a>
						</span><br>
					</div>
				</div>
			<!-- /user -->
			</div>
			<div class="etcinfo">
				<?php if( !empty( $bestreviewdata['Review']['contents_user_count'] ) && $bestreviewdata['Review']['contents_user_count'] != 1 ):?>
					<img src="/common/images/contents/impitem_txt_0001.gif" alt="他にこの商品のクチコミを書いています" width="180" height="10"><br>
					<?php if( !empty( $bestreviewdata['Review']['other_review'] ) ):?>
					<?php foreach( $bestreviewdata['Review']['other_review'] as $key => $other_review ):?>
						<div class="item clr">
						<a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "pc_index", $other_review['Review']['smallcategoryid'], $other_review['Review']['ssmallcategoryid'] )  );?>">
							<img src="<?php echo Configure::read( "local.master.website" ) . $other_review['Product']['small40photoimg'];?>" width="40" height="40">
						</a>
						<p><a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "pc_index", $other_review['Review']['smallcategoryid'], $other_review['Review']['ssmallcategoryid'] )  );?>"><?php echo h( str_replace( '　　', '　', rtrim( $other_review['0']['productname_class'], '　' ) ) )?></a></p>
						<!-- /item -->
						</div>
					<?php endforeach;?>
					<?php endif;?>
				<?php endif;?>
			<!-- /etcinfo -->
			</div>
		<!-- /subItemdata -->
		</div>
		</div>
	<!-- /usersItemData -->
	</div>
<!-- /impressionItem -->
</div>
</div>
</div>
<?php endif;?>
<?php endif;?>
<?php endif;?>

<?php if( !empty( $reviewDatas ) ):?>
<?php foreach( $reviewDatas as $reviewer ) : ?>
<a id="<?php echo $reviewer['Review']['id'];?>"></a>
<div class="impressionItem">

<?php if($reviewer['Review']['old_product_flag'] != 1):?>
<div class="basic">
<?php else:?>
<div class="olditem">
<?php endif;?>

	<div class="title clr">
		<div class="itemPic">
			<?php if($reviewer['Review']['old_product_flag'] != 1):?>
				<?php if( !empty( $reviewer['Product']['small40photoimg'] ) ): ?><img src="<?php echo Configure::read( "local.master.website" ) . $reviewer['Product']['small40photoimg'];?>" alt="<? echo h($reviewer['Product']['productname']);?>" width="40" height="40"><?php endif;?><br>
			<?php else:?>
				<img height="40" width="40" alt="アクアフォースローション Ｌ（さっぱりタイプ）・ボトル入り" src="/common/images/contents/olditem_image.jpg">
			<?php endif;?>
		</div>
		<div class="itemTxt">
			<p class="date">
				投稿日：
				<?php 
				    if( !empty( $reviewer['Review']['review_time'] ) ){
				    	$commit_date = date( "Y年m月d日", strtotime( $reviewer['Review']['review_time'] ) );
						echo $commit_date;
				    }
				?>
			</p>
			<h2>
				<?php 
					if( $reviewer['Review']['old_product_flag'] == 1 ) {
						echo "（旧）";
					}else{
						
					}
					if( !empty( $reviewer['0']['productname_class'] ) ) {
						echo h( str_replace( '　　', '　', rtrim( $reviewer['0']['productname_class'], '　' ) ) );
					}
					
				?>
			</h2>			
		</div>
	<!-- /title -->
	</div>
	<?php if($reviewer['Review']['old_product_flag'] == 1):?>
	<div class="outer">
	<?php endif;?>
	<div class="simpleInfo clr">
		<div class="rating" style="text-align:left;">
			<img src="/common/images/contents/txt_0003.gif" alt="満足度：" width="39" height="11" class="inline txt"><?php if( empty( $reviewer['Review']['saatisfaction'] ) )  $reviewer['Review']['saatisfaction'] = 0 ;  echo Review::formatSatisfaction( $reviewer['Review']['saatisfaction'], 1 ); ?><br/>
		</div>
		<p class="subData"><span class="nowrap">投稿時：</span>
			<?php
				$show_arr = array();
				/** **代前半(後半) */
				$contributionAge = Review::formatContributionAge( $reviewer['Review']['review_time'], $reviewer['Review']['birth'] );
				if( !empty( $contributionAge ) )array_push( $show_arr, $contributionAge );
				
				/** 肌質 */
				$skin_type = Review::getSkinTypes();
				if( !empty( $reviewer['Review']['skin_type'] ) && !empty( $skin_type[$reviewer['Review']['skin_type']] ) ){
					array_push( $show_arr, $skin_type[$reviewer['Review']['skin_type']] );
				}
				
				/** オルビス歴 */
				$useYear = Review::formatUseYear( $reviewer['Review']['review_time'], $reviewer['Review']['orbis_use_date'] );
				if( !empty( $useYear ) ){
					$useYear = 'オルビス歴' . ' ' . $useYear;
					array_push( $show_arr, $useYear );
				} else {
					$useYear = 'オルビス歴' . ' ' . '不明';
					array_push( $show_arr, $useYear );
				}
				
				echo join( "・", $show_arr );
			?>
		</p>
	<!-- /simpleInfo -->
	</div>
	<?php if($reviewer['Review']['old_product_flag'] == 1):?>
	</div>
	<?php endif;?>
	<div class="usersItemData clr">
		<div class="itemdata">
		<div class="itemdata-inner">
			<h5>
			<?php 
					echo h( $reviewer['Review']['title'] );
			?>
			</h5>
			<p class="txt">
				<?php 
					echo Review::emojiToImgPage($reviewer['Review']['body']);
				?>
			</p>
			<p class="purpose">
				<span class="xs nowrap">目的&nbsp;:&nbsp;</span>
				<?php 
					if( !empty( $reviewer['Review']['use_purpose_names'] ) ){
						$use_purpose_array = explode( ' ', $reviewer['Review']['use_purpose_names'] );
			 			foreach( $use_purpose_array as $data ){
			 				echo " <span class='nowrap'>$data</span> ";
			 			}
					}
				?>
			 </p>
			<ul class="icon clr">
				<?php if( $reviewer['Review']['product_type'] == 1 ) :?>
					<li><img src="/common/images/contents/impitem_icon_0101.gif" alt="商品購入" width="61" height="23"></li>
					<?php if( $reviewer['Review']['purchase_frequency'] == 1 ) :?>
					    <li><img src="/common/images/contents/impitem_icon_0103.gif" alt="商品購入" width="61" height="23"></li>
					<? elseif( $reviewer['Review']['purchase_frequency'] == 2 ) :?>
						<li><img src="/common/images/contents/impitem_icon_0102.gif" alt="はじめて" width="61" height="23"></li>
					<? endif; ?>
				<? endif; ?>
				<?php if( $reviewer['Review']['product_type'] == 2 ) :?>
					<li><img src="/common/images/contents/impitem_icon_0100.gif" alt="サンプル" width="61" height="23"></li>
				<? endif; ?>
				<?php 
					$UseSeasons = Review::getUseSeasons();
					if( !empty( $reviewer['Review']['use_season'] ) ){
						$useseason = explode( ",", $reviewer['Review']['use_season'] );
						foreach( $useseason as $key => $season ){
							echo '<li class="season"><img src="/common/images/contents/impitem_icon_010'.($season - 1 + 4).'.gif" width="25" height="24"> </li>';
						}
					}
				?>
			</ul>
			<?php
				$cookie_key = $_SERVER['REMOTE_ADDR'].Review::REFERENCE_COOKIE.$reviewer['Review']['id']; 
				$cookie_key = preg_replace( "/\./", '_', $cookie_key);
			?>
			<div class="vote <?php if( !empty( $_COOKIE["{$cookie_key}"] ) ):?>vote02<?php endif;?>">

					<span id="reference<?php echo $reviewer['Review']['id'];?>" <?php if( !empty( $_COOKIE["{$cookie_key}"] ) || ( !empty( $uerinfo_arr['contentsuserid'] ) && !empty( $reviewer['Review']['contents_user_id'] ) && $uerinfo_arr['loginstatus'] == 1 && $uerinfo_arr['userstatus'] == 2 && $uerinfo_arr['contentsuserid'] == $reviewer['Review']['contents_user_id'] ) ):?>style="display:none;"<?php endif;?>>
					<?php if( !empty( $smallcategoryid ) ): ?>
					<?php echo $form->hidden("Review.smallcategoryid", array( 'value' => $smallcategoryid ));?>
					<?php endif; ?>
					<img src="/common/images/contents/impitem_txt_vote.gif" alt="このクチコミは参考になりましたか？" width="150" height="9" class="inline txt">
					<img src="/common/images/contents/impitem_btn_0001.gif" alt="参考になった" style="cursor:pointer;" alt="参考になった" onclick="javascript:ajax_reference( '1', '<?php echo $reviewer['Review']['id'];?>');" class="inline imgOv" />
					<img src="/common/images/contents/impitem_btn_0002.gif" alt="参考にならなかった" class="inline imgOv" onclick="javascript:ajax_reference( '2', '<?php echo $reviewer['Review']['id'];?>');" />
					</span>

					<span id="over<?php echo $reviewer['Review']['id'];?>" <?php if( empty( $_COOKIE["{$cookie_key}"] ) ):?>style="display:none;"<?php endif;?>>
						<img src="/common/images/contents/impitem_txt_vote02.gif" alt="ご評価ありがとうございました。" width="171" height="13" class="txt"><br>						
					</span>
				
				<p>このクチコミが参考になった人&nbsp;:&nbsp;&nbsp;<span class="strong big" id="test"><span id="referenceNum<?php echo $reviewer['Review']['id'];?>"><?php echo number_format( $reviewer['Review']['reference'] );?></span>人</span></p>
			<!-- /vote -->
			</div>
		<!-- /itemdata -->
		</div>
		</div>
		<div class="subItemdata">
		<div class="subItemdata-inner clr">
			<div class="user clr">
				<?php if( $reviewer['ContentsUser']['status'] == ContentsUser::STATUS_ONE && $reviewer['ContentsUser']['delete_flg'] == ContentsUser::DELETE_FLG_OFF ):?>
				<a href="<?php echo $html->url( array( "controller" => "mypages", "action" => "public_profile", $reviewer['ContentsUser']['contents_user_id'] ) );?>"  style="text-align: center; width: 60px; display: block; float: left; word-wrap:break-word;" ><img src="<?php echo Review::profileImage( $reviewer['ContentsUser']['images'], 0 );?>" alt="<?php echo h($reviewer['ContentsUser']['nickname']);?>" class="face"></a>
				<?php else:?>
				<img src="/noimage/noimage60.jpg" alt="" width="60" height="60">
				<?php endif;?>
				<?php if( $reviewer['ContentsUser']['status'] == ContentsUser::STATUS_ONE && $reviewer['ContentsUser']['delete_flg'] == ContentsUser::DELETE_FLG_OFF ):?>
				<div class="txt">
					<p class="name" style="word-wrap:break-word; overflow:hidden;"><a href="<?php echo $html->url( array( "controller" => "mypages", "action" => "public_profile", $reviewer['ContentsUser']['contents_user_id'] ) );?>"><?php echo h( $reviewer['ContentsUser']['nickname'] );?></a>さん</p>
					<p class="num">（<?php if( !empty( $reviewer['Review']['contents_user_count'] ) ):?><?php echo number_format( $reviewer['Review']['contents_user_count'] ) . '件';?><?php endif;?>）</p>
					<div class="mvp">
						<a href="#help-popup-memberrank" class="help-popup-open">
							<?php if( $reviewer['ContentsUser']['user_rank_id'] == Review::USE_RANK_ONE ):?>
								<img src="/common/images/contents/icon_rank_mvp.gif" alt="MVP" width="44" height="15">
							<?php elseif( $reviewer['ContentsUser']['user_rank_id'] == Review::USE_RANK_TWO ):?>
								<img src="/common/images/contents/icon_rank_s.gif" alt="S" width="44" height="15">
							<?php elseif( $reviewer['ContentsUser']['user_rank_id'] == Review::USE_RANK_THREE ):?>
								<img src="/common/images/contents/icon_rank_a.gif" alt="A" width="44" height="15">
							<?php elseif( $reviewer['ContentsUser']['user_rank_id'] == Review::USE_RANK_FOUR ):?>
								<img src="/common/images/contents/icon_rank_b.gif" alt="B" width="44" height="15">
							<?php endif;?>
						</a>
						<span class="popImgBase">
							<a href="#" class="popupBlockThisImg">
								<img src="/common/images/contents/dummy_pop.png" alt="" width="103" height="58" class="popStatus ping">
							</a>
						</span><br>
					</div>
				</div>
				<?php endif;?>
			<!-- /user -->
			</div>
			<div class="etcinfo">
				<?php if( !empty( $reviewer['Review']['contents_user_count'] ) && $reviewer['Review']['contents_user_count'] != 1 ):?>
					<img src="/common/images/contents/impitem_txt_0001.gif" alt="他にこの商品のクチコミを書いています" width="180" height="10"><br>
					<?php if( !empty( $reviewer['Review']['other_review'] ) ):?>
					<?php foreach( $reviewer['Review']['other_review'] as $key => $other_review ):?>
						<div class="item clr">
						<a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "pc_index", $other_review['Review']['smallcategoryid'], $other_review['Review']['ssmallcategoryid'] )  );?>">
							<img src="<?php echo Configure::read( "local.master.website" ) . $other_review['Product']['small40photoimg'];?>" width="40" height="40">
						</a>
						<p><a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "pc_index", $other_review['Review']['smallcategoryid'], $other_review['Review']['ssmallcategoryid'] )  );?>"><?php echo h( str_replace( '　　', '　', rtrim( $other_review['0']['productname_class'], '　' ) ) )?></a></p>
						<!-- /item -->
						</div>
					<?php endforeach;?>
					<?php endif;?>
				<?php endif;?>
			<!-- /etcinfo -->
			</div>
		<!-- /subItemdata -->
		</div>
		</div>
	<!-- /usersItemData -->
	</div>
<!-- /impressionItem -->
</div>
</div>
<?php endforeach;?>
<?php endif;?>
<?php echo $form->hidden( "Review.resultNum", array("value" => $paginator->counter( array( "format" => "%count%" ) )) );?>
<script type="text/javascript">
jQuery("#htmlBody").show();
</script>
<?php 
    if(!isset($review_id)){
       echo $this->element( 'normal_paginator' );
    }else{
       $si = $this->passedArgs['smallcategoryid'];
		$si .= "/" . $this->passedArgs['ssmallcategoryid'];
       echo $this->element( 'ajax_small' , array("smallcategoryName" => $smallcategoryName , "si" => $si , "review_count" => $review_count));
    }
?>
<script type="text/javascript">
jQuery (function() {
	jQuery("body").append('<div id="help-popupBg"></div>');

	jQuery('div.help-popup').click(function() {
		jQuery('div.help-popup').draggable({});
	});

	jQuery('#help-popupBg').click(function() {
		var $temp = jQuery("#help-popupBg").attr("class")
		jQuery( "#"+$temp ).hide();
		jQuery("#help-popupBg").hide();

		// IE6 bug
		jQuery("select").css("visibility","visible");
	});

	jQuery('a.help-popup-open').click(function() {
		// IE6 bug
		jQuery("select").css("visibility","hidden");

		jQuery(this.hash).show();

		jQuery("#help-popupBg").show();
//		jQuery("#help-popupBg").css("width",jQuery(document).width()+"px");
		jQuery("#help-popupBg").css("width",jQuery("#headerContainer").width()+"px");
		jQuery("#help-popupBg").css("height",jQuery(document).height()+"px");

		var $temp = jQuery(this).attr("href");
		$temp = $temp.replace("#","");
		jQuery("#help-popupBg").attr("class",$temp);

		var $winW = jQuery(window).width();
		var $winH = jQuery(window).height();

		var $setTop = ($winH - jQuery(this.hash).height()) / 2 + jQuery(window).scrollTop();
		$setTop = parseInt($setTop);

		var $setLeft = ($winW - jQuery(this.hash).width()) / 2 + jQuery(window).scrollLeft();
		$setLeft = parseInt($setLeft);

		jQuery(this.hash).css("top",$setTop+"px");
		jQuery(this.hash).css("left",$setLeft+"px");

		return false;
	});

	jQuery('a.help-popup-close').click(function() {
		jQuery(this.hash).hide();
		jQuery("#help-popupBg").hide();

		// IE6 bug
		jQuery("select").css("visibility","visible");

		return false;
	});
});
</script>

<script type="text/javascript">
	initRollovers1.setProcess();
</script>

<?php if( !empty( $search ) ):?>
<script type="text/javascript">
	window.location.hash = "#result";
</script>
<?php endif;?>

<script type="text/javascript">		
if( jQuery("#addSearchConditionBox").size() ){
	jQuery("#addSearchConditionBox div.topBtnOpen a").click(function() {
		if( jQuery("#addSearchConditionBox div#topBtnAreaLine").size() ){
			jQuery("#addSearchConditionBox div#topBtnAreaLine").show();
		}
		jQuery("#addSearchConditionBox div.topBtnOpen").hide();
		jQuery("#addSearchConditionBox div.topBtnClose").show();
		jQuery("#addSearchConditionInputBox div.addSearchConditionResult p.resultMess span.posion a").show();
		jQuery("#addSearchConditionInputBox").slideDown({
			duration: 1000,
			easing: 'easeOutQuart'
		});
		return false;
	});
	jQuery("#addSearchConditionBox div.topBtnClose a, #addSearchConditionBox div.addSearchConditionResult p.close a").click(function() {
		if( jQuery("#addSearchConditionBox div#topBtnAreaLine").size() ){
			jQuery("#addSearchConditionBox div#topBtnAreaLine").hide();
		}
		jQuery("#addSearchConditionBox div.topBtnOpen").show();
		jQuery("#addSearchConditionBox div.topBtnClose").hide();
		jQuery("#addSearchConditionInputBox div.addSearchConditionResult p.resultMess span.posion a").hide();
		jQuery("#addSearchConditionInputBox").slideUp({
			duration: 1000,
			easing: 'easeOutQuart'
		});
		return false;
	});
	
	setSearchRefinement.temp.retrievalResultNumBasic = parseFloat(jQuery("div.addSearchConditionResult span.resultNum_1").text());
	/** liupeihua */

	jQuery("div.addSearchConditionResult span.settingClear a").click(function() {
		setSearchRefinement.clearData();
		return false;
	});

	jQuery("form#searchcondition input:checkbox").click(function() {
		setSearchRefinement.startSearchRefinement();
	});
	jQuery("form#searchcondition label img").click(function() {
		var $browserName = jQuery.browser.name;
		if( $browserName == 'msie' ){
			var $tempTimmer = setTimeout(function(){
				setSearchRefinement.startSearchRefinement();
			}, setSearchRefinement.temp.retrievalResultNumWait);
		};
	});
	jQuery("input#formAddKeyword").blur(function() {
		setSearchRefinement.startSearchRefinement();
	});
}

/** キーワード検索についての検索結果 */
var search_keyword = jQuery("#ReviewKeyword").val();
jQuery("#searchKey").text( search_keyword );

/** この条件で絞り込むと150件です */
var result_num = jQuery("#ReviewResultNum").val();
jQuery("#resultNums").text( result_num );

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
