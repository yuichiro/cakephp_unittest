				<div class="searchListBox clr">
				<div class ="searchListBox-item clr">
						<?php 
							$i = 1;
							$id ='';
							foreach( $productCategoryLink as $aproductCategoryLink ):
								if( $i < 10 ){
									$id = '0'.$i;
								}else{
									$id = $i;
								}
								
						?>
						<?php 
						$class = '';
						if($i == '1'){ 
							$class = "first slistbox".$id ;
						}else{
							$class = "slistbox".$id ;
						}
						?>
						<h3 class="<?php echo $class; ?>"><span><?php echo $aproductCategoryLink['Midcategory']['midcategoryname'] ?></span></h3>
						<div class="item clr">
							<ul class="item clr">
								<?php foreach( $aproductCategoryLink['Smallcategory'] as $aproductCategorySubLink ) :
								?>
								<li>
										<a href = "<?php echo $html->url( array( "controller" => "reviews", "action" => "pc_index" , $aproductCategorySubLink['ProductsSsmallcategory']['smallcategoryid'] , $aproductCategorySubLink['Ssmallcategory']['ssmallcategoryid'] ) );?>">
											<?php echo $aproductCategorySubLink['Ssmallcategory']['ssmallcategoryname']; ?><?if($aproductCategorySubLink['0']['review_count'] != 0):?>（<?php echo $aproductCategorySubLink['0']['review_count']?>件）<?php endif; ?>
									</a>
								</li>
								<?php endforeach; ?>
							</ul>
							<!-- /item -->
						</div>
						<!-- /searchListBox-target -->
						<?php
							$i = $i+1;
						 	endforeach;
						?>

					</div>
				<!-- /searchListBox -->
				</div>