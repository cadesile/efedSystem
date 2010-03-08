<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $

	$rp = $node->roleplay_info;
	$c = efed_character_load($rp->cid);
	$m = efed_match_load($rp->match_id);
	$card = efed_card_load($m->card_id);
	$show = efed_show_load($card->show_id);
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">		
	<p>
		<b><?php print $show->title; ?></b> (<em><?php print $card->location; ?></em>) - <?php print format_date($card->card_date,'long'); ?>
	</p>
	<h3><?php print $m->match_title; ?></h3>
	<div class="match_info">
		<div><b>Rules:</b> <?php echo  taxonomy_get_term($m->rules)->name; ?></div>
		<div><b>Referee:</b> <?php echo  taxonomy_get_term($m->referee)->name; ?></div>
		<?php if($match->title>0) { ?>
		<div><b>Title:</b> <?php echo  taxonomy_get_term($match->title)->name; ?></div>
		<?php } ?>	
	</div>
    <span class="submitted">Written by <?php print $c->name; ?> on <?php print format_date($node->changed,'long');?></span>

  <div class="content clear-block">
	<?php if($c->img_main_render){?>
    <div class="character_thumb">
	<?php print $c->img_main_render?>
	</div>
	<?php } ?>
	<?php print $content ?>
  </div>
</div>
