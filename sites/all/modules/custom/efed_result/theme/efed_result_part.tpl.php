<?php 
	$m = efed_match_load($node->match_id);
	$c = efed_card_load($m->card_id);
	$r = efed_result_load($node->result_id);
?>


<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
	<?php 
	if($node->part_type=='match'){
	
		$op = array('fragment' => $node->nid);
	
	?>
	<h3><?php print l($c->card_title,'node/'.$r->nid,$op); ?></h3>
	<?php print theme('efed_match',$m,NULL,'rules'); ?>
	<?php
	}	
	?>
	
  <div class="content clear-block">
    <?php print $node->body ?>
  </div>

  <div class="clear-block">
    <div class="meta">
    <?php if ($taxonomy): ?>
      <div class="terms"><?php print $terms ?></div>
    <?php endif;?>
    </div>

    <?php if ($links): ?>
      <div class="links"><?php print $links; ?></div>
    <?php endif; ?>
  </div>

</div>