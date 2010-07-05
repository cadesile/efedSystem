<?php
//print '<pre>';
//print_r ($show);
//print '</pre>';
//exit;

$card = $show->next_card->card_info;

?>

<div class="show">
	<?php if($show->banner): ?>
		<?php print theme('imagecache','efed_thumbnail',$show->banner,$show->title); ?>
	<?php endif; ?>
	<div class="show-name"><?php print l($show->title,'node/'.$show->nid); ?></div>
        <div class="description"><?php print truncate_utf8($show->description, 150); ?></div>
	<?php if($card): ?>
	<div class="next-card">
		<b>Next card:</b>
		<div class="card"><?php echo l(format_date($card->card_date, 'small'), 'node/'.$card->nid); ?></div>
		<div class="location"><?php print $card->location; ?></div>
	</div>
	<?php endif; ?>
	<div class="clear-block"></div>
</div>