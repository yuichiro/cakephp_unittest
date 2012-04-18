
			<div class="userinfo03 clr">
				<div class="name">
					<p><a href="<?php echo $html->url(array("controller"=>"mypages","action"=>"index"));?>"><?php echo h($logininfo['nickname']);?></a>さん</p>
				</div>
				<div class="olmypage">
					<p><a href="<?php echo Configure::read( "local.master.website" ) . '/mypage/';?>">オンラインショップのマイページへ</a></p>
				</div>
			<!-- /userinfo01 -->
			</div>
			<div class="userinfo02">
			<div class="userinfo02-inner clr">
				<div class="pic-profile">
						<a class="strong" href="<?php echo $html->url(array("controller"=>"mypages","action"=>"profile_add"));?>"><img src="/noimage/noimage60.jpg"></a><br>
				</div>
				<div class="txt-profile">
					<p class="xs">プロフィールが未登録です。</p>
					<p class="xs">クチコミを投稿するには、プロフィールの登録が必要です。</p>
					<div class="btn sp-t5 sp-b0">
						<a href="<?php echo $html->url(array("controller"=>"mypages","action"=>"profile_add"));?>"><img src="/common/images/header/btn_registration.gif" alt="今すぐ登録へ" width="76" height="18" class="imgOv"></a>&nbsp;&nbsp;<a href="<?php echo $html->url( array( "controller" => "mypages", "action" => "logout"  )  );?>">ログアウト</a><br>
					</div>
				</div>
				<a href="<?php echo h(Configure::read( "local.master.website" ))?>/basket/" class="basket">買い物かごを見る</a>
			<!-- /userinfo02 -->
			</div>
			</div>
