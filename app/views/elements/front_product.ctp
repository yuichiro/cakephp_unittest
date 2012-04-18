<?php $paginator->options( array(  "url" => $this->passedArgs ) );?>


<div class="pageSettingBox pageSettingBox_box">
	<div class="pageSettingBox-inner">
	<div class="pageSettingBox-pd clr">
		<div class="kuchikomiListTit clr">
			<img src="/common/images/contents/pagesetting_txt_0001.gif" alt="この商品のクチコミ一覧" width="149" height="20" class="f-l">
		<!-- /kuchikomiListTit -->
		</div>
<!-- さらに条件を絞り込む -->
<?php // echo $ajax->form("detail", "post", array( "id"=>"search_form", "update" => "result", "name" => "search_form" ) );?>
<form id="search_form" name="search_form" method="post" action="<?php echo $html->url( array( "controller" => "reviews", "action" => "detail", $url ) );?>"  onsubmit="javascript:close();" accept-charset="utf-8">
				<div id="addSearchConditionBox" class="clr">
					<div class="topBtnArea clr">
						<div class="topBtnOpen">
							<a href="#addSearchConditionBox"><img src="/common/images/contents/btn_searchopen01.gif" alt="さらに条件を絞り込む" width="135" height="20" class="imgOv"></a><br>
						</div>
						<div class="topBtnClose">
							<a href="#addSearchConditionBox"><img src="/common/images/contents/btn_searchclose01.gif" alt="閉じる" width="60" height="21" class="imgOv"></a><br>
						</div>
					<!-- /topBtnArea -->
					</div>

					<div id="topBtnAreaLine" class="clr">
						<img src="/common/images/contents/clear.gif" alt="" width="1" height="1"><br>
					</div>

					<div id="addSearchConditionInputBox" class="clr">
						<h2 class="addsearch"><img src="/common/images/contents/title_h2_addsearch01.gif" alt="絞り込み条件" width="92" height="20"></h2>
						<div class="addSearchConditionBlock">
						<div class="addSearchConditionBlock-inner clr">
							<h3><img src="/common/images/contents/title_h3_addsearch01.gif" alt="使用目的" width="52" height="12"></h3>
							<div class="clr">
							<ul class="searchRef formPurpose clr">
								<?php echo $form->select( "Review.use_purpose", Review::getUsepurpose(), null, array('multiple'=>'checkbox',"li_class"=>"inline","class"=>"inline"));?>
							</ul>
							</div>
						<!-- /addSearchConditionBlock -->
						</div>
						</div>
						<div class="addSearchConditionBlock addSearchConditionBlock02">
						<div class="addSearchConditionBlock-inner clr">
							<h3><img src="/common/images/contents/title_h3_addsearch02.gif" alt="年代" width="26" height="12"></h3>
							<div class="clr">
							<ul class="searchRef formAge clr">
								<?php echo $form->select( "Review.birth", Review::getBirth(), null, array('multiple'=>'checkbox',"li_class"=>"inline","class"=>"inline"));?>
							</ul>
							</div>
						<!-- /addSearchConditionBlock -->
						</div>
						</div>
						<div class="addSearchConditionBlock">
						<div class="addSearchConditionBlock-inner clr">
							<h3><img src="/common/images/contents/title_h3_addsearch03.gif" alt="オルビス歴" width="65" height="13"></h3>
							<div class="clr">
							<ul class="searchRef formHistry clr">
								<?php echo $form->select( "Review.orbis_use_date", Review::getUseYear(), null, array('multiple'=>'checkbox',"li_class"=>"inline","class"=>"inline"));?>
							</ul>
							</div>
						<!-- /addSearchConditionBlock -->
						</div>
						</div>
						<div class="addSearchConditionBlock addSearchConditionBlock02">
						<div class="addSearchConditionBlock-inner clr">
							<h3><img src="/common/images/contents/title_h3_addsearch04.gif" alt="肌質" width="26" height="13"></h3>
							<div class="clr">
							<ul class="searchRef formSkintype clr">
								<?php echo $form->select( "Review.skin_type", Review::getSkinTypes(), null, array('multiple'=>'checkbox',"li_class"=>"inline","class"=>"inline"));?>
							</ul>
							</div>
						<!-- /addSearchConditionBlock -->
						</div>
						</div>
						<div class="addSearchConditionBlock">
						<div class="addSearchConditionBlock-inner clr">
							<h3><img src="/common/images/contents/title_h3_addsearch05.gif" alt="使用シーズン" width="78" height="13"></h3>
							<div class="clr">
							<ul class="searchRef formUseSeason clr">
								<?php echo $form->select( "Review.use_season", Review::getUseSeasons(), null, array('multiple'=>'checkbox', "li_class"=>"inline","class"=>"inline" ));?>
							</ul>
							</div>
						<!-- /addSearchConditionBlock -->
						</div>
						</div>
						<div class="addSearchConditionBlock addSearchConditionBlock02">
						<div class="addSearchConditionBlock-inner clr">
							<h3><img src="/common/images/contents/title_h3_addsearch07.gif" alt="キーワード" width="64" height="12"></h3>
							<?php echo $form->text( "Review.keyword", array( 'class' => 'ontxt' ) );?><br>
						<!-- /addSearchConditionBlock -->
						</div>
						</div>

						<div class="addSearchConditionResult">
						<div class="addSearchConditionResult-inner">
							<p class="resultMess"><span class="mess">この条件で絞り込むと</span><span class="resultNum_1" id="resultNums">0</span><span class="result">件</span><span class="mess">です<span class="settingClear"><span class="posion"><a href="#addSearchConditionBox">条件をクリア</a></span></span></span></p>
							<?php echo $form->hidden("Smallcategory.smallcategoryid", array( 'value' => $smallcategoryid ));?>
							<?php echo $form->hidden("Smallcategory.ssmallcategoryid", array( 'value' => $ssmallcategoryid ));?>
							<input type="image" name="submitResult" value="結果を表示する" src="/common/images/contents/btn_addsearch01.gif" alt="結果を表示する" class="imgOv" class="imgOv"><br>
							<p class="close"><a href="#addSearchConditionBox">閉じる</a></p>
						<!-- /addSearchConditionResult -->
						</div>
						</div>
					<!-- /addSearchConditionInputBox -->
					</div>

				<!-- /addSearchConditionBox -->
				</div>
<input type="hidden" name="searchtype" id="searchtype" value="forDetailListSearch_detail" />
</form>
<!-- /さらに条件を絞り込む -->
					<div class="kuchikomiList2 clr">
						<ul class="listType">
							<li class="first"><img src="/common/images/contents/txt_0001.gif" alt="並び替え" width="47" height="11" class="inline"></li><?php if( ( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.review_time' && $this->passedArgs['direction'] == 'desc' ) || !( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) ) ): ?><li><a style="text-decoration:none; color:#666666;border-left:medium none;padding:0 5px 0 10px;">新しい順</a></li><?php else: ?><li class="second" style="padding:11px 0px 12px 5px;"><?php echo $paginator->sort( "新しい順", "Review.review_time", array( "model"=>"Ssmallcategory", "direction" => "desc" ) );?></li><?php endif;?><?php if( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.review_time' && $this->passedArgs['direction'] == 'asc' ): ?><li><a style="text-decoration:none; color:#666666;">古い順</a></li><?php else: ?><li><?php echo $paginator->sort( "古い順", "Review.review_time", array( "model"=>"Ssmallcategory", "direction" => "asc" ) );?></li><?php endif;?><?php if( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.saatisfaction' && $this->passedArgs['direction'] == 'desc' ): ?><li><a style="text-decoration:none; color:#666666;">満足度が高い順</a></li><?php else: ?><li><?php echo $paginator->sort( " 満足度が高い順", "Review.saatisfaction", array( "model"=>"Ssmallcategory", "direction" => "desc" ) );?></li><?php endif;?><?php if( isset( $this->passedArgs['sort'] ) && isset( $this->passedArgs['direction'] ) && $this->passedArgs['sort'] == 'Review.reference' && $this->passedArgs['direction'] == 'desc' ): ?><li><a style="text-decoration:none; color:#666666;">参考になった順</a></li><?php else: ?><li><?php echo $paginator->sort( " 参考になった順", "Review.reference", array( "model"=>"Ssmallcategory", "direction" => "desc" ) );?></li><?php endif;?>
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
	jQuery(".addSearchConditionBlock-inner ul :checkbox").click(function(){
		search();
	});
	
	jQuery("#ReviewKeyword").keyup(function(){
		search();
	});
	
	//jQuery("#addSearchConditionInputBox div.addSearchConditionResult p.resultMess span.posion a").click(function(){
	//	search();
	//});
</script>

