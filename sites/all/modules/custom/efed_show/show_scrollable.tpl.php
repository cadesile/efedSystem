	<?php
	
	?>
	<!-- root element for scrollable --> 
	<ul id="scrollable" class="jcarousel-skin-show_scrollable">     
		
		<?php foreach($nodes as $node){ 
			$card = $node->show_info->next_card->card_info;
			$match = $card->matches[0];

		?>
		
			<li>
				<div class="show_scroller">
					<div class="image">
					<?php
					if($node->show_info->banner){
						print theme('imagecache','efed_home_scroll',$node->show_info->banner,$node->title);
					}
					?>
					</div>
					<?php print theme('efed_match',$match,'Main Event','small'); ?>
					<div class="content">
						<div class="title">Show: <?php print l($node->title,'node/'.$node->nid); ?></div>
						<div class="date">Next Card: <?= ($node->nid)? l(format_date($card->card_date),'node/'.$node->nid): 'TBC';?></div>
					</div>
				</div>
			</li>
	<?php } ?> 
	</ul>
	