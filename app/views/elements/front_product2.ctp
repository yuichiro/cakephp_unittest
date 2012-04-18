<?php
$si = $this->passedArgs['smallcategoryid'];
$si .= "/" . $this->passedArgs['ssmallcategoryid'];

?>
				<div class="pageSettingBox2">
				<div class="pageSettingBox2-inner">
					
					<div class="listBox2 clr">
						<p class="#">全<?php echo $review_count; ?>件中1件を表示（<?php echo $html->link(  "一覧を見る", "/products/".$si . "/" , array('font-size'=>'100px') );?>）</p>
					</div>
				<!-- /pageSettingBox2 -->
				</div>
				</div>

