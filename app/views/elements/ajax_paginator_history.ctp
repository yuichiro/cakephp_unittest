<?php $paginator->options( array( 'update' => 'result', "url" => $this->passedArgs ) );?>
<p class="layoutR"><?php echo $paginator->prev( '前へ' );?>&nbsp;
<?php echo $paginator->numbers( array( 'modulus' => 4, "separator"=>" " ) ); ?>&nbsp;
<?php echo $paginator->next( '次へ' );?>
（<?php echo number_format( $paginator->counter( array( "format" => "%count%" ) ) );?>件)
</p>

