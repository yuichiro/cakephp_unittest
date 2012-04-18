<?php 
	if( $this->params["action"] == "public_profile" || ( $this->params["controller"] == "mypages" && $this->params["action"] == "index" ) ) {
		$this->passedArgs['anchor'] = 'result';		
	}else if( $this->params["action"] == "public_products" ) 
		$this->passedArgs['anchor'] = 'result2';
	else {
		$this->passedArgs['anchor'] = 'htmlBody';
	}
	$paginator->options( array( "url" => $this->passedArgs ) );
?>

<div class="pageMoveBox sp-b10" style="width:640px; float:left;">
	<div class="pageMoveBox-inner">
		<ul class="pageMove">
			<li class="prev"><?php echo $paginator->prev( '前へ' );?></li>
			<?php echo $paginator->numbers( array( 'modulus' => 4, "separator"=>"", "tag" => "li", "class" => "num" ) ); ?>
			<li class="next"><?php echo $paginator->next( '次へ' );?></li>
			<li class="numCase">（全<?php echo number_format( $paginator->counter( array( "format" => "%count%" ) ) );?>件）</li>
			<li>
				<?php if( !empty($search) ): ?>
					<?php if( !empty( $type ) && !isset($searchlinkclear)):?>
						<a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "use_purpose_serch",$type,$id ) );?>" >絞り込み条件をクリアする</a>
					<?php endif;?>
					<?php if( empty( $type ) && !empty($this->passedArgs['keyword']) && empty( $smallcategoryid ) ):?>
						<a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "keyword_serch",$this->passedArgs['keyword'] ) );?>" >絞り込み条件をクリアする</a>
					<?php endif;?>
					<?php if( !empty( $smallcategoryid ) && empty( $ssmallcategoryid ) && isset($searchlinkclear) ):?>
						<a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "pc_index",$smallcategoryid ) );?>" >絞り込み条件をクリアする</a>
					<?php endif;?>
					<?php if( !empty( $smallcategoryid ) && !empty( $ssmallcategoryid ) && isset($searchlinkclear) ):?>
						<a href="<?php echo $html->url( array( "controller" => "reviews", "action" => "pc_index",$smallcategoryid,$ssmallcategoryid ) );?>" >絞り込み条件をクリアする</a>
					<?php endif;?>
				<?php endif;?>
			</li>
		</ul>
	</div>
</div>