<?php
$current = efed_character_load($belt->current_champion->cid);
unset($belt->history[0]);
?>
<div class="belt">
    <div class="belt-info">
        <h3><?php print $belt->name; ?></h3>
        <?php if ($belt->current_champion): ?>
            <?php print theme('efed_author_pane', $current); ?>
        <div class="current-champion"><b>Start date</b>: <?php print format_date($belt->current_champion->start, 'small'); ?></div>
        <?php endif; ?>
        </div>    
        <div class="history">
            <h3>Previous Champions:</h3>
        <?php if ($belt->history): ?>

            <?php foreach ($belt->history as $history): ?>

            <?php $c = efed_character_load($history->cid); ?>
                        <div class="past-champion">
                            <div class="holder"><b>Name</b>: <?php print $c->name; ?></div>
                            <div class="date"><b>Reign</b>: <?php print format_date($history->start, 'small'); ?> - <?php print format_date($history->end, 'small'); ?></div>
                        </div>

            <?php endforeach; ?>

        <?php else: ?>
                        <div class="vacant">Title vacant.</div>
        <?php endif; ?>
    </div>
    <div class="clear"></div>
</div>