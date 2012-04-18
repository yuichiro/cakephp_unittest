<div id="headerContainer">
	<div id="header" class="clr">
		<div class="logo logo02"><a href="<?php echo h(Configure::read( "local.master.website" ))?>/"><img src="/common/images/header/logo_0001.gif" alt="ORBIS" width="97" height="97"></a></div>
		<div class="blockL">
			<div class="backtoshop backtoshop02">
				<a href="<?php echo h(Configure::read( "local.master.website" ))?>/"><img src="/common/images/header/txt_gototop.gif" alt="オンラインショップTOPへ戻る" width="176" height="12"></a><br>
			</div>
			<a href="/"><img src="/common/images/header/logo_0004.gif" alt="つかって！おすすめ！みんなのクチコミ" width="200" height="89" class="sitetit02"></a><br>
		<!-- /blockL -->
		</div>
		<div class="blockR">
			<div class="navi clr">
			<ul class="navi clr">
				<li class="onlineshop"><a href="<?php echo h(Configure::read( "local.master.website" ))?>/"><span>オンラインショップ</span></a></li>
				<li class="kuticomi"><a href="/"><span>みんなのクチコミ</span></a></li>
				<li class="skincheck"><a href="<?php echo h(Configure::read( "local.master.website" ))?>/skincheck/"><span>スキンチェック</span></a></li>
				<li class="shop"><a href="<?php echo h(Configure::read( "local.master.website" ))?>/shop/"><span>店舗情報</span></a></li>
                                <li class="corp"><a href="<?php echo h(Configure::read( "local.master.website" ))?>/corp/"><span>会社案内</span></a></li>
			</ul>
			</div>
			<?php if(  isset($logininfo['loginstatus']) && $logininfo['loginstatus'] == 1  ) {?>
			<?php if( !empty( $logininfo ) ){
				  if( empty($logininfo['nickname'])){
					  echo $this->element( "include/header_login_02" );
				 } elseif( !empty( $contentsuserinfo ) ){ ?>

				<div class="userinfo01 clr">
					<div class="name">
						<p><a href="<?php echo $html->url(array("controller"=>"mypages","action"=>"index"));?>" class="strong"><?php echo h($logininfo['nickname']);?></a>さん&nbsp;（<?php if( !empty( $logininfo['count'] ) ):?><?php echo number_format($logininfo['count']);?>件<?php else:?><?php echo number_format($logininfo['count']);?>件<?php endif;?>）</p>
					</div>
					<div class="olmypage">
						<p><a href="<?php echo Configure::read( "local.master.website" ) . '/mypage/';?>">オンラインショップのマイページへ</a></p>
					</div>
				</div>
			<!-- /userinfo01 -->
				<div class="userinfo02">
				<div class="userinfo02-inner clr">
					<div class="pic-profile">
						<a href="<?php echo $html->url(array("controller"=>"mypages","action"=>"index"));?>"><img src="<?php echo ContentsUser::profileImage( $contentsuserinfo['ContentsUser']['images'], 0 );?>" alt="<?php echo h($logininfo['nickname']);?>さん" ></a><br>
					</div>
					<div class="txt-profile">
						<div class="btn">
							<a href="<?php echo $html->url(array("controller"=>"mypages","action"=>"index"));?>"><img src="/common/images/header/btn_mypage.gif" alt="クチコミMyページへ" width="116" height="18" class="imgOv"></a>&nbsp;&nbsp;<a href="<?php echo $html->url( array( "controller" => "mypages", "action" => "logout"  )  );?>">ログアウト</a><br>
						</div>
						<p class="xs"><img src="/common/images/header/txt_profile.gif" alt="PROFILE" width="44" height="9" class="inline sp-r10"><a href="<?php echo $html->url(array("controller"=>"mypages","action"=>"profile_edit"));?>">編集する</a></p>
						<ul class="data clr">
							<li>・<?php echo ContentsUser::formatContributionAge( date('Y-m-d'), $contentsuserinfo['ContentsUser']['birth'] );?></li>
							<li>・<?php  $arrSkinTypesContentsUser = ContentsUser::getSkinTypes();
								echo $arrSkinTypesContentsUser[$contentsuserinfo['ContentsUser']['skin_type']];
							?>
							</li>
							<li>・<?php if( !empty( $contentsuserinfo['ContentsUser']['orbis_use_date'] )):?>オルビス歴 <?php echo ContentsUser::formatUseYear( date( "Y-m-d" ), $contentsuserinfo['ContentsUser']['orbis_use_date'] );?>
							<?php else:?>オルビス歴 不明
							<?php endif;?>
							</li>
						</ul>
					</div>
					<a href="<?php echo h(Configure::read( "local.master.website" ))?>/basket/" class="basket">買い物かごを見る</a>
				<!-- /userinfo02 -->
				</div>
				</div>
		<!-- /blockR -->
				<?php 	} else {?>
				<?php echo $this->element( "include/header_login_03" );?>
				<?php 
						}
					}else{
					 echo $this->element( "include/header" );
					}
			} else { 
				 echo $this->element( "include/header" );
			}?>
		
		<!-- /blockR -->
		</div>
	</div>
</div>
