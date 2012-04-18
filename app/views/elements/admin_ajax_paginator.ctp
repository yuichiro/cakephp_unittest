<?php $this->passedArgs['anchor'] = 'pageTop'; ?>
<?php $paginator->options( array( 'update' => 'result', "url" => $this->passedArgs ) );?>

<p class="layoutR mg0"><?php echo $paginator->prev( '前へ' );?>
	 <?php echo $paginator->numbers( array( 'modulus' => "4", "separator"=>" ", "class" => "num" ) ); ?>
	 <?php echo $paginator->next( '次へ' );?>
	 　（<?php echo $paginator->counter( array( "format" => "%start%" ));?>～<?php echo $paginator->counter( array( "format" => "%end%" ));?>件／<?php echo number_format( $paginator->counter( array( "format" => "%count%" ) ) );?>件中)
	 </p>