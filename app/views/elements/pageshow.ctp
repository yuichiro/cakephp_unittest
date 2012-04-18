<div class="nextpage">     
  <?php $paginator->options( array( 'update' => 'result', "url" => $this->passedArgs ) );?>
  
  <ol class="clearfix">
    <?php echo $paginator->show_limit_numbers( array( 'modulus' => 4, "separator"=>"｜" ) ); ?>
  </ol> 
</div>
<?php echo $this->element( "sql_dump" );?>