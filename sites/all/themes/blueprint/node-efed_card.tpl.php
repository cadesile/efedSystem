<?php
// $Id: node.tpl.php,v 1.1.2.1 2009/07/06 08:03:14 agileware Exp $
	
	$card = efed_card_load_by_nid($node->nid);
?>
<div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
  <div class="content">
	<div class="card">
		<?php print theme('imagecache','efed_show_max',$card->show->banner,$card->show->title); ?>
		<div class="info">
			<div><b>Location:</b> <?php print $card->location; ?></div>
			<div><b>Card Date:</b> <?php print format_date($card->card_date,'custom','d/m/Y - i:H'); ?></div>
			<div><b>Roleplay Deadline:</b> <?php print format_date($card->card_deadline,'custom','d/m/Y - i:H'); ?></div>
			<div><b>Roleplay Limit:</b> <?php print $card->roleplay_limit; ?></div>
		</div>
    <?php print $content; ?>
	<div class="matches">
		<?php		
		$card->matches = array_reverse($card->matches);
		
		foreach($card->matches as $match){
			print theme('efed_match',$match);
		}
		?>
	</div>
	</div>
  </div>
  <?php if (!empty($links) || !empty($terms)) { ?>
    <div class="linkswrap">
      <?php if ($links) { ?><div class="postlinks"><?php print $links?></div><?php }; ?>
      <?php if ($terms) { ?><div class="taxonomy">Tags: <?php print $terms?></div><?php } ?>
    </div>
  <?php } ?>
</div>
