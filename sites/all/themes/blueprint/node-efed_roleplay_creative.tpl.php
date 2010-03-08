<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $

	$rp = $node->roleplay_info;
	$c = efed_character_load($rp->cid);
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">		
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
