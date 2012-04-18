<!-- あなたに似た属性の方 -->
<h2><img src="/common/images/subcontents/title_h2_profile02.gif" alt="あなたに似た属性の方" width="130" height="35"></h2>
<div class="subContentsBox">
<?php $count = 0;?>
<?php foreach($similarUsers as $similarUser):?>
	<div class="pearts <?php if($count == 9):?>peartslast<?php endif;?>">
		<div class="profile">
		
		<a href="<?php echo $html->url( array( "controller" => "mypages", "action" => "public_profile", $similarUser['ContentsUser']['contents_user_id'] ) );?>" class="profile" style="width:60px; word-wrap:break-word; overflow:hidden;">
		<img src="<?php echo ContentsUser::profileImage( $similarUser['ContentsUser']['images'], 0 );?>" alt="<?php echo h($similarUser['ContentsUser']['nickname']);?>さん">
		</a>
		
		</div>
		
		<p style="width:110px; word-wrap:break-word; overflow:hidden;"><a href="<?php echo $html->url( array( "controller" => "mypages", "action" => "public_profile", $similarUser['ContentsUser']['contents_user_id'] ) );?>"><?php echo h($similarUser['ContentsUser']['nickname']);?></a>さん</p>
		
		<p>（<?php echo number_format($similarUser['0']['count_review']);?>件）</p>
	<!-- /pearts -->
	</div>
<?php $count++;?>
<?php endforeach;?>

<!-- /subContentsBox -->
</div>
<!-- あなたに似た属性の方 -->
