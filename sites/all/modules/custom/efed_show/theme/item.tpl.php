<?php
$card = $node->card_info;
$show = $card->show;

$main_event = (is_array($card->matches)) ? $card->matches[0] : NULL;

?>

<div class="show-item">
    <div class="image">
        <?php print theme('imagecache', $imagecache, $show->thumbnail); ?>
    </div>
    <div class="title"><?php print l($node->title . ' - ' . format_date($card->card_date, 'small'), 'node/' . $node->nid); ?></div>
    <?php if ($type == 'main'): ?>
            <div class="card-info">
                <div><b>Scheduled time</b>: <?php print format_date($card->card_date, 'long'); ?></div>
                <div><b>Event location</b>: <?php print $card->location; ?></div>
            </div>
            <div class="main-event">Main event <em><?php print $main_event->match_title; ?></em>.</div>
            <?php if($main_event->match_belt): ?>
            <div class="match-belt">The <em><?php print $main_event->match_belt; ?></em> will be on the line.</div>
            <?php endif; ?>
    <?php endif; ?>
    <div class="clear"></div>
</div>
