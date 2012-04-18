<div class="side">
	<ul class="menu">
		<li class="cur"><span>管理メニュー</span></li>
		<li><a href="<?php echo $form->url( array( 'controller' => 'admin_accumulate_monthly', 'action' => 'admin_user' ) );?>"><span>月別集計</span></a></li>

		<li class="cur"><span>投稿管理</span></li>
		<li><a href="<?php echo $form->url( array( 'controller' => 'admin_reviews', 'action' => 'admin_index_menu' ) )?>"><span>投稿検索・一覧</span></a></li>

		<li class="cur"><span>会員管理</span></li>
		<li><a href="<?php echo $form->url( array( "controller" => "admin_users", "action" => "admin_index" ) );?>"><span>会員検索・一覧</span></a></li>

		<li class="cur"><span>ランキング管理</span></li>
		<li><a href="<?php echo $form->url( array( "controller" => "admin_rank_keywords", "action" => "admin_index" ) );?>"><span>検索キーワード</span></a></li>
		<li><a href="<?php echo $form->url( array( "controller" => "admin_review_ranks", "action" => "admin_index" ) );?>"><span>総合ランキング</span></a></li>
		<li><a href="<?php echo $form->url( array( "controller" => "admin_review_ranks", "action" => "admin_good" ) );?>"><span>グッドアドバイザー部門</span></a></li>
		<li><a href="<?php echo $form->url( array( "controller" => "admin_review_ranks", "action" => "admin_popularity" ) );?>"><span>人気者レビュアー部門</span></a></li>
		<li><a href="<?php echo $form->url( array( "controller" => "admin_review_ranks", "action" => "admin_favorite" ) );?>"><span>オルビス大好き部門</span></a></li>

		<li class="cur"><span>商品番号管理</span></li>
		<li><a href="<?php echo $form->url( array( "controller" => "admin_reviews", "action" => "admin_change_product_index" ) );?>""><span>クチコミの移動</span></a></li>
		<li><a href="<?php echo $form->url( array( "controller" => "admin_reviews", "action" => "admin_delete_product_index" ) );?>""><span>商品別クチコミ一括削除</span></a></li>

		<li class="cur"><span>お知らせ管理</span></li>
		<li><a href="<?php echo $form->url( array( 'controller' => 'admin_infomaitons', 'action' => 'admin_index' ) )?>"><span>お知らせ一覧</span></a></li>

		<li class="cur"><span>その他管理</span></li>
		<li><a href="<?php echo $form->url( array( 'controller' => 'admin_purposes', 'action' => 'admin_index' ) )?>"><span>使用目的</span></a></li>
		<li><a href="<?php echo $form->url( array( 'controller' => 'admin_ngwords', 'action' => 'admin_index' ) )?>"><span>NGワード</span></a></li>
		<li><a href="<?php echo $form->url( array( 'controller' => 'admin_keywords', 'action' => 'admin_index' ) )?>"><span>注目のキーワード</span></a></li>
		<li><a href="<?php echo $form->url( array( "controller" => "admin_batches", "action" => "admin_index" ) );?>"><span>商品API</span></a></li>
		<li><a href="<?php echo $form->url( array( "controller" => "admin_ssmallcategories", "action" => "admin_index" ) );?>"><span>シリーズ小分類管理</span></a></li>
	</ul>
</div>
