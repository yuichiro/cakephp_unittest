		<div class="section clear">
			<div class="colL">
				<input class="submitBtnRed inline" value="ステータス更新" id="statusUpBtn" onclick="statusUp()" type="button" />
			</div>
			<div class="colL">
				<p class="textL mg0"><a href="javascript:csv_down_load();">CSVダウンロード</a></p>
			</div>
			<div class="colR">
			<?php $paginator->options( array( 'update' => 'result', "url" => $this->passedArgs ) );?>
	
			<?php echo $paginator->prev('前へ');?> 
			<?php echo $paginator->numbers( array( 'modulus' => 4, "separator"=>" ", "class" => "num") ); ?>
			<?php echo $paginator->next('次へ');?> 
			<?php if( empty( $this->passedArgs['limit'] ) ){
				$this->passedArgs['limit'] = 10;
				
			} ?>
			（<?php echo $paginator->counter( array( "format" => "%start%" ));?>～<?php echo $paginator->counter( array( "format" => "%end%" ));?>件
			／
			<?php echo number_format( $paginator->counter( array( "format" => "%count%" ) ) );?>件中）
			</div>
		<!-- /section -->
		</div>