<?php	
	$card = efed_card_load($node->card_id);
	$show = efed_show_load($card->show_id);
?>
<div class="result">
  <div class="content">
	<div class="info">
		<div><b>Location: </b> <?php print $card->location?></div>
		<div><b>Card Date: </b> <?php print format_date($card->card_date,'medium')?></div>
		<div><b>Roleplay Deadline: </b> <?php print format_date($card->card_deadline,'medium')?></div>
	</div>
	<div class="summary">
	<?php print $node->content['body']['#value']; ?>
	</div>
	<?php if($node->parts):?>
	<?php foreach($node->parts as $part):?>
	<?php
		$part_node = node_load($part->nid);
	?>
	<div class="part">
		<a name="<?php print $part_node->nid; ?>"></a>
		<h3><?php print l($part_node->title,'node/'.$part_node->nid); ?></h3>
		<?php print $part_node->content_body?>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
	<?php print $node->content['fivestar_widget']['#value']; ?>
  </div>
</div>
