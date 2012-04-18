<?php $paginator->options( array( 'update' => 'result', "url" => $this->passedArgs ) );?>
<font size="1">
&#63882;<?php echo $paginator->prev( '前へ' );?>｜<?php echo $paginator->numbers( array( 'modulus' => 4, "separator"=>" " ) ); ?>｜&#63884;<?php echo $paginator->next( '次へ' );?><br>
<br>
</font>
