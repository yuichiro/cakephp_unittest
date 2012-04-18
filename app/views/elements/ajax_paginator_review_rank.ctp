<?php 
$paginator->options( array( 'update' => 'result', "url" => $this->passedArgs ) );?>
<?php echo $paginator->prev( '前へ' );?>&nbsp;
<?php echo $paginator->numbers( array( 'modulus' => 4, "separator"=>" " ) ); ?>&nbsp;
<?php echo $paginator->next( '次へ' );?>
<?php if( !empty( $new ) ){?>
（<?php echo $paginator->counter( array( "format" => "%start%" ));?>～<?php echo $paginator->counter( array( "format" => "%end%" ));?>件／<?php echo number_format( $paginator->counter( array( "format" => "%count%" ) ) );?>件中　公開決定時)
<?php }else{ ?>
（<?php echo $paginator->counter( array( "format" => "%start%" ));?>～<?php echo $paginator->counter( array( "format" => "%end%" ));?>件／<?php echo number_format( $paginator->counter( array( "format" => "%count%" ) ) );?>件中)
<?php } ?>
