<div class="node<?php if ($sticky) { print " sticky";} ?><?php if (!$status) { print " node-unpublished";} ?>">
  <div class="content">
			<?php echo theme('imagecache','efed_show_max',$node->show_info->banner,$node->show_info->title); ?>
			<?php echo $content; ?>
		<div class="cards">
			<b>Cards:</b>
			<?php if($node->show_cards): ?>
	<?php	foreach($node->show_cards as $card): ?>
			<p>
					<?php echo l($node->show_info->title . ' ' . format_date($card->card_date,'small'),'node/'.$card->nid); ?>
			</p>
				<?php endforeach; ?>
			<?php else: ?>
			<p><em>Emtpy</em></p>
<?php endif; ?>
		</div>
  </div>
</div>

