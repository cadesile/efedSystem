<div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
  <div class="content">
	<?php echo theme('imagecache','efed_show_banner',$node->show_info->banner,$node->show_info->title); ?>
    <?php echo $content; ?>
	<div class="cards">
	<b>Cards:</b>
	<?php
	if($node->show_cards){
		foreach($node->show_cards as $card){
		?>
		<p><?php echo l($node->show_info->title . ' ' . format_date($card->card_date,'custom','m/d/Y'),'node/'.$card->nid); ?></p>
		<?php
		}
	}else{
	?>
	<p><em>Emtpy</em></p>
	<?php
	}
	?>
	</div>
  </div>
</div>
