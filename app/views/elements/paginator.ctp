<font size="1">
 <?php if($paginator->counter( array( "format" => "%count%" ) ) != 0){?>&#63882;<?php echo $paginator->prev('前へ',array('accesskey'=>'4'));?> <?php if($paginator->counter( array( "format" => "%count%" ) )> 5){?> ｜ <? }?><?php echo $paginator->numbers(array( "separator"=>"&nbsp;")); ?><?php if($paginator->counter( array( "format" => "%count%" ) ) > 5){?> ｜ <?}?>&#63884; <?php echo $paginator->next('次へ',array('accesskey'=>'6'));?><?php }?><br>
<br>
</font>


