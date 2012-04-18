				<div class="searchListBox clr">
					<div class="searchListBox-target searchListBox-target-first">
						<h3><img src="/common/images/contents/title_h3_search01.gif" alt="目的別" width="32" height="11"></h3>
						<div class="clr">
						<ul class="target clr">
							<?php $usePurpose = Review::getUsepurpose(); ?>
							<?php foreach( $usePurpose  as $ausePurposekey => $ausePurposevalue) { ?>
								<li><a href="<?php echo $html->url( array( "controller" => "reviews","action" => "use_purpose_serch", "purpose" ,$ausePurposekey)); ?>"><?php echo $ausePurposevalue;?></a></li>
							<?php }?>
						</ul>
						</div>
					<!-- /searchListBox-target -->
					</div>
					<div class="searchListBox-target">
						<h3><img src="/common/images/contents/title_h3_search02.gif" alt="年代別" width="33" height="11"></h3>

						<div class="clr">
						<ul class="target clr">
							<?php $Birth_arr = Review::getBirth(); ?>
							<?php foreach( $Birth_arr as $abirthkey => $abirthvalue  ){?>
								<li><a href="<?php echo $html->url( array( "controller" => "reviews","action" => "use_purpose_serch", "birth" ,$abirthkey)); ?>"><?php echo $abirthvalue;?></a></li>
							<?php }?>
						</ul>

						</div>
					<!-- /searchListBox-target -->
					</div>
					<div class="searchListBox-target">
						<h3><img src="/common/images/contents/title_h3_search03.gif" alt="肌質別" width="33" height="11"></h3>
						<div class="clr">
						<ul class="target clr">
							<?php $Birth_arr = Review::getSkinTypes(); ?>
							<?php foreach( $Birth_arr as $askinTypesKey => $askinTypesValue  ){?>
								<li><a href="<?php echo $html->url( array( "controller" => "reviews","action" => "use_purpose_serch", "skintype",$askinTypesKey)); ?>"><?php echo $askinTypesValue;?></a></li>
							<?php }?>
						</ul>
						</div>
					<!-- /searchListBox-target -->
					</div>
				<!-- /searchListBox -->
				</div>