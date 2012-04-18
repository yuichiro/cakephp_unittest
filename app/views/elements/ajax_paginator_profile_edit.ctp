<?php $paginator->options( array( 'update' => 'result', "url" => $this->passedArgs ) );?>

<!-- 検索・一覧 -->

<div class="section">
	<p>ステータス：
	<?php if( isset( $this->passedArgs['status'] ) &&  $this->passedArgs['status'] == '-1' ): ?>
	<?php echo "すべて";?>｜<?php echo $paginator->statues( "未確認", array( "model"=>"Review", "status" => "0" ) );?>｜<?php echo $paginator->statues( "掲載", array( "model"=>"Review", "status" => "1" ) );?>｜<?php echo $paginator->statues( "保留", array( "model"=>"Review", "status" => "2" ) );?>｜<?php echo $paginator->statues( "非掲載", array( "model"=>"Review", "status" => "3" ) );?> | <?php echo $paginator->statues( "API非掲載", array( "model"=>"Review", "status" => "4" ) );?>
	<?php elseif(isset( $this->passedArgs['status'] ) && $this->passedArgs['status'] == '0'): ?>
	<?php echo $paginator->statues( "すべて", array( "model"=>"Review", "status" => "-1" ) );?>｜<?php echo  "未確認";?>｜<?php echo $paginator->statues( "掲載", array( "model"=>"Review", "status" => "1" ) );?>｜<?php echo $paginator->statues( "保留", array( "model"=>"Review", "status" => "2" ) );?>｜<?php echo $paginator->statues( "非掲載", array( "model"=>"Review", "status" => "3" ) );?> | <?php echo $paginator->statues( "API非掲載", array( "model"=>"Review", "status" => "4" ) );?>
	<?php elseif(isset( $this->passedArgs['status'] ) && $this->passedArgs['status'] == '1'): ?>
	<?php echo $paginator->statues( "すべて", array( "model"=>"Review", "status" => "-1" ) );?>｜<?php echo $paginator->statues( "未確認", array( "model"=>"Review", "status" => "0" ) );?>｜<?php echo "掲載";?>｜<?php echo $paginator->statues( "保留", array( "model"=>"Review", "status" => "2" ) );?>｜<?php echo $paginator->statues( "非掲載", array( "model"=>"Review", "status" => "3" ) );?> | <?php echo $paginator->statues( "API非掲載", array( "model"=>"Review", "status" => "4" ) );?>
	<?php elseif(isset( $this->passedArgs['status'] ) && $this->passedArgs['status'] == '2'): ?>
	<?php echo $paginator->statues( "すべて", array( "model"=>"Review", "status" => "-1" ) );?>｜<?php echo $paginator->statues( "未確認", array( "model"=>"Review", "status" => "0" ) );?>｜<?php echo $paginator->statues( "掲載", array( "model"=>"Review", "status" => "1" ) );?>｜<?php echo "保留";?>｜<?php echo $paginator->statues( "非掲載", array( "model"=>"Review", "status" => "3" ) );?> | <?php echo $paginator->statues( "API非掲載", array( "model"=>"Review", "status" => "4" ) );?>
	<?php elseif(isset( $this->passedArgs['status'] ) && $this->passedArgs['status'] == '3'): ?>
	<?php echo $paginator->statues( "すべて", array( "model"=>"Review", "status" => "-1" ) );?>｜<?php echo $paginator->statues( "未確認", array( "model"=>"Review", "status" => "0" ) );?>｜<?php echo $paginator->statues( "掲載", array( "model"=>"Review", "status" => "1" ) );?>｜<?php echo $paginator->statues( "保留", array( "model"=>"Review", "status" => "2" ) );?>｜<?php echo "非掲載";?> | <?php echo $paginator->statues( "API非掲載", array( "model"=>"Review", "status" => "4" ) );?>
	<?php elseif(isset( $this->passedArgs['status'] ) && $this->passedArgs['status'] == '4'): ?>
		<?php echo $paginator->statues( "すべて", array( "model"=>"Review", "status" => "-1" ) );?>｜<?php echo $paginator->statues( "未確認", array( "model"=>"Review", "status" => "0" ) );?>｜<?php echo $paginator->statues( "掲載", array( "model"=>"Review", "status" => "1" ) );?>｜<?php echo $paginator->statues( "保留", array( "model"=>"Review", "status" => "2" ) );?>｜<?php echo $paginator->statues( "非掲載", array( "model"=>"Review", "status" => "3" ) );?> | <?php echo "API非掲載";?>
	<?php endif;?>
	
	<?php echo "　並べ替え："; ?>
	<?php if( isset( $this->passedArgs['sort'] ) && $this->passedArgs['direction'] == 'desc' ): ?>
	<?php echo "新しい順";?>｜<?php echo $paginator->sort( "古い順", "Review.review_time", array( "model"=>"Review", "direction" => "asc" ) );?>
	<?php else:?>
		    <?php echo $paginator->sort("新しい順", "Review.review_time", array( "model"=>"Review", "direction" => "desc" ) );?>｜<?php echo "古い順";?>
	<?php endif;?>
	
	
	
	<?php echo " 表示切替："; ?>
	<?php if( isset( $this->passedArgs['limit'] ) && $this->passedArgs['limit'] == '10' ): ?>
	<?php echo "10件";?>｜<?php echo $paginator->limit( "30件",array( "model"=>"Review", "limit" => 30 ) );?>｜<?php echo $paginator->limit( "50件",array( "model"=>"Review", "limit" => 50 ) );?></a></p>
	<?php elseif( isset( $this->passedArgs['limit'] ) && $this->passedArgs['limit'] == '30' ):  ?>
	<?php echo $paginator->limit( "10件",array( "model"=>"Review", "limit" => 10 ) );?>｜<?php echo "30件";?>｜<?php echo $paginator->limit( "50件",array( "model"=>"Review", "limit" => 50 ) );?></a></p>  
	<?php elseif( isset( $this->passedArgs['limit'] ) && $this->passedArgs['limit'] == '50' ):  ?> 
	<?php echo $paginator->limit( "10件",array( "model"=>"Review", "limit" => 10 ) );?>｜<?php echo $paginator->limit( "30件",array( "model"=>"Review", "limit" => 30 ) );?>｜<?php echo "50件";?></a></p> 
	<?php endif;?> 

	<p class="layoutR mg0"><?php echo $paginator->prev( '前へ' );?>
	 <?php echo $paginator->numbers( array( 'modulus' => "4", "separator"=>" ", "class" => "num" ) ); ?>
	 <?php echo $paginator->next( '次へ' );?>
	（<?php echo $paginator->counter( array( "format" => "%start%" ));?>～<?php echo $paginator->counter( array( "format" => "%end%" ));?>件／<?php echo number_format( $paginator->counter( array( "format" => "%count%" ) ) );?>件中)
	</p>

<!-- /section -->
</div>