<?php 
	if( $this->params["action"] == "public_profile" || ( $this->params["controller"] == "mypages" && $this->params["action"] == "index" ) ) {
		$this->passedArgs['anchor'] = 'result';		
	}else if( $this->params["action"] == "public_products" ) 
		$this->passedArgs['anchor'] = 'result2';
	else {
		$this->passedArgs['anchor'] = 'htmlBody';
	}
	$paginator->options( array( 'update' => 'result', "url" => $this->passedArgs ) );
?>

<div class="pageMoveBox sp-b10">
	<div class="pageMoveBox-inner">
		<ul class="pageMove">
			<li class="prev"><?php echo $paginator->prev( '前へ' );?></li>
			<?php echo $paginator->numbers( array( 'modulus' => 4, "separator"=>"", "tag" => "li", "class" => "num" ) ); ?>
			<li class="next"><?php echo $paginator->next( '次へ' );?></li>
			<li class="numCase">（全<?php echo number_format( $paginator->counter( array( "format" => "%count%" ) ) );?>人）</li>
		</ul>
	</div>
</div>