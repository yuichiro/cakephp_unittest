<?php $paginator->options( array( 'update' => 'result', "url" => $this->passedArgs ) );?>

<!-- 検索・一覧 -->
<div class="section">
	<p>クチコミ投稿：
	<?php if( isset( $this->passedArgs['contribution'] ) &&  $this->passedArgs['contribution'] == '2' ): ?>
	<?php echo "すべて";?>｜<?php echo $paginator->contribution( "未投稿", array( "model"=>"ContentsUser", "contribution" => "0" ) );?>｜<?php echo $paginator->contribution( "投稿済み", array( "model"=>"ContentsUser", "contribution" => "1" ) );?>
	<?php elseif(isset( $this->passedArgs['contribution'] ) &&  $this->passedArgs['contribution'] == '0'):?>
	<?php echo $paginator->contribution( "すべて", array( "model"=>"ContentsUser", "contribution" => "2" ) );?>｜<?php echo "未投稿";?>｜<?php echo $paginator->contribution( "投稿済み", array( "model"=>"ContentsUser", "contribution" => "1" ) );?>
	<?php elseif(isset( $this->passedArgs['contribution'] ) &&  $this->passedArgs['contribution'] == '1'):?>
	<?php echo $paginator->contribution( "すべて", array( "model"=>"ContentsUser", "contribution" => "2" ) );?>｜<?php echo $paginator->contribution( "未投稿", array( "model"=>"ContentsUser", "contribution" => "0" ) );?>｜<?php echo "投稿済み";?>
	<?php endif;?>
	
	<?php echo "　　　並べ替え：";?>
	<?php if( isset( $this->passedArgs['sort'] ) && $this->passedArgs['direction'] == 'desc' ): ?>
	<?php echo "新しい順";?>｜<?php echo $paginator->sort( "古い順", "ContentsUser.created", array( "model"=>"ContentsUser", "direction" => "asc" ) );?>
	<?php else:?>
	<?php echo $paginator->sort( "新しい順", "ContentsUser.created", array( "model"=>"ContentsUser", "direction" => "desc" ) );?>｜<?php echo "古い順";?>
	<?php endif;?>
	
		<?php echo "　　　表示切替："; ?>
	<?php if( isset( $this->passedArgs['limit'] ) && $this->passedArgs['limit'] == '10' ): ?>
	<?php echo "10件";?>｜<?php echo $paginator->limit( "30件",array( "model"=>"ContentsUser", "limit" => 30 ) );?>｜<?php echo $paginator->limit( "50件",array( "model"=>"ContentsUser", "limit" => 50 ) );?></a></p>
	<?php elseif( isset( $this->passedArgs['limit'] ) && $this->passedArgs['limit'] == '30' ):  ?>
	<?php echo $paginator->limit( "10件",array( "model"=>"ContentsUser", "limit" => 10 ) );?>｜<?php echo "30件";?>｜<?php echo $paginator->limit( "50件",array( "model"=>"ContentsUser", "limit" => 50 ) );?></a></p>  
	<?php elseif( isset( $this->passedArgs['limit'] ) && $this->passedArgs['limit'] == '50' ):  ?> 
	<?php echo $paginator->limit( "10件",array( "model"=>"ContentsUser", "limit" => 10 ) );?>｜<?php echo $paginator->limit( "30件",array( "model"=>"ContentsUser", "limit" => 30 ) );?>｜<?php echo "50件";?></a></p> 
	<?php endif;?>  
	
	</p>

	<p class="layoutR mg0"><?php echo $paginator->prev( '前へ' );?>
	 <?php echo $paginator->numbers( array( 'modulus' => "4", "separator"=>" ", "class" => "num" ) ); ?>
	 <?php echo $paginator->next( '次へ' );?>
	 　（<?php echo $paginator->counter( array( "format" => "%start%" ));?>～<?php echo $paginator->counter( array( "format" => "%end%" ));?>件／<?php echo number_format( $paginator->counter( array( "format" => "%count%" ) ) );?>件中)
	 </p>

<!-- /section -->
</div>
