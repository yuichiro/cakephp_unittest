<?php echo $this->element( "paginate_anchor" );?>
<?php if( !empty( $search ) ):?>
<script type="text/javascript">
window.location.hash = "#result";
</script>
<?php endif;?>
<style type="text/css">
	#mainContents div.impressionItem div.usersItemData div.itemdata ul.icon li.season {
	margin-right:6px;
	}
	#mainContents div.impressionItem div.usersItemData div.itemdata ul.icon li {
	font-size:12px;
	line-height:100%;
	}
</style>
<script type="text/javascript">
jQuery(document).ready(function(){
	var search_keyword = jQuery("#ReviewKeyword").val();
	jQuery("#searchKey").text( search_keyword );
	
	var result_num = jQuery("#ReviewResultNum").val();
	jQuery("#resultNums").text( result_num );
});
</script>

<?php if( !empty( $reviewDatas ) ):?>
<div class="section arrange-r sp-b5">
	<p class="xs">
		<?php if( !empty($search) ): ?>
			<?php if( !empty( $type ) && !isset($searchlinkclear)):?>
				<a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "use_purpose_serch",$type,$id ) );?>" class="f-l" >絞り込み条件をクリアする</a>
			<?php endif;?>
			<?php if( empty( $type ) && !empty($this->passedArgs['keyword']) && empty( $smallcategoryid ) ):?>
				<a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "keyword_serch",$this->passedArgs['keyword'] ) );?>" class="f-l" >絞り込み条件をクリアする</a>
			<?php endif;?>
			<?php if( !empty( $smallcategoryid ) && isset($searchlinkclear) ):?>
				<a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "pc_index",$smallcategoryid ) );?>" class="f-l" >絞り込み条件をクリアする</a>
			<?php endif;?>
		<?php endif;?>
		<?php if( $this->params['action'] != "keyword_serch" ):?>
			<a href="<?php echo $html->url( array( "controller" => "contents", "action" => "special", "attention" ) );?>">商品ご使用上の注意点</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<?php endif;?>
		<a href="#help-popup-viewofkuchikomi" class="help-popup-open">クチコミ画面の見方</a>
	</p>
</div>
<?php echo $this->element( 'normal_paginator_review' );?>
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

					<span id="reference<?php echo $bestreviewdata['Review']['id'];?>" <?php if( !empty( $_COOKIE["{$cookie_key}"] ) || ( !empty( $uerinfo_arr['contentsuserid'] ) && !empty( $bestreviewdata['Review']['contents_user_id'] ) && $uerinfo_arr['loginstatus'] == 1 && $uerinfo_arr['userstatus'] == 2 && $uerinfo_arr['contentsuserid'] == $bestreviewdata['Review']['contents_user_id'] ) ):?>style="display:none;"<?php endif;?>>
					<?php if( !empty( $smallcategoryid ) ): ?>
					<?php echo $form->hidden("Review.smallcategoryid", array( 'value' => $smallcategoryid ));?>
					<?php endif; ?>
					<img src="/common/images/contents/impitem_txt_vote.gif" alt="このクチコミは参考になりましたか？" width="150" height="9" class="inline txt">
					<img src="/common/images/contents/impitem_btn_0001.gif" alt="参考になった" style="cursor:pointer;" alt="参考になった" onclick="javascript:ajax_reference( '1', '<?php echo $bestreviewdata['Review']['id'];?>');" class="inline imgOv" />
					<img src="/common/images/contents/impitem_btn_0002.gif" alt="参考にならなかった" class="inline imgOv" onclick="javascript:ajax_reference( '2', '<?php echo $bestreviewdata['Review']['id'];?>');" />
					</span>

					<span id="over<?php echo $bestreviewdata['Review']['id'];?>" <?php if( empty( $_COOKIE["{$cookie_key}"] ) ):?>style="display:none;"<?php endif;?>>
						<img src="/common/images/contents/impitem_txt_vote02.gif" alt="ご評価ありがとうございました。" width="171" height="13" class="txt"><br>						
					</span>
				
				<p>このクチコミが参考になった人&nbsp;:&nbsp;&nbsp;<span class="strong big" id="test"><span id="referenceNum<?php echo $bestreviewdata['Review']['id'];?>"><?php echo number_format( $bestreviewdata['Review']['reference'] );?></span>人</span></p>
				
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
<?php foreach( $reviewDatas as $reviewer ) : ?>
<div class="impressionItem" style="float:left;">

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
					if( !empty( $reviewer['0']['productname_class'] ) ) echo h( str_replace( '　　', '　', rtrim( $reviewer['0']['productname_class'], '　' ) ) );
				?>
			</h2>
			<ul class="link" style="margin-top:10px">
				<li style="display:inline;font-size:10px;margin-right:20px;"><a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "pc_index", $reviewer['Review']['smallcategoryid'], $reviewer['Review']['ssmallcategoryid'] ) );?>">この商品のクチコミを見る</a></li>
				<li style="display:inline;font-size:10px;margin-right:20px;"><a href="<?php echo Configure::read( "local.master.website" ) ."/small/".$reviewer['Review']['smallcategoryid'];?>">この商品のお買い物ページへ</a></li>
			</ul>
		</div>
	<!-- /title -->
	</div>
	
	<?php if($reviewer['Review']['old_product_flag'] == 1):?>
	<div class="outer">
	<?php endif;?>
	<div class="simpleInfo clr">
		<div class="rating" style="text-align:left;">
			<img src="/common/images/contents/txt_0003.gif" alt="満足度：" width="39" height="11" class="inline txt"><?php if( empty( $reviewer['Review']['saatisfaction'] ) )  $reviewer['Review']['saatisfaction'] = 0 ;  echo Review::formatSatisfaction( $reviewer['Review']['saatisfaction'], 1 ); ?><br />
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
					echo Review::emojiToImgPage( $reviewer['Review']['body'] );
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
				<a style="text-align: center; width: 60px; display: block; float: left; word-wrap:break-word;" href="<?php echo $html->url( array( "controller" => "mypages", "action" => "public_profile", $reviewer['ContentsUser']['contents_user_id'] ) );?>"  >
				<img src="<?php echo Review::profileImage( $reviewer['ContentsUser']['images'], 0 );?>" alt="<?php echo h($reviewer['ContentsUser']['nickname']);?>" class="face">
				</a>
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
						<br>
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
						<a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "pc_index", $other_review['Review']['smallcategoryid'], $other_review['Review']['ssmallcategoryid'] )  );?>" >
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
<?php else: ?>
<p>該当するクチコミがみつかりませんでした。</p>
<p>キーワードを変更して再度検索してください。</p>
<?php endif;?>
<?php echo $form->hidden( "Review.resultNum", array("value" => $paginator->counter( array( "format" => "%count%" ) )) );?>
<?php if( !empty( $reviewDatas ) ):?>
<?php echo $this->element( 'normal_paginator' );?>
<?php endif;?>
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