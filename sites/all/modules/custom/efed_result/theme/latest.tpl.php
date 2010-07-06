<?php if($nodes): ?>
<div class="latest-results">
    <div class="main">
        <?php print theme('efed_result_item', $nodes['first'], 400, 'efed_roleplay_character_main'); ?>
    </div>
    <div class="second_left">
        <?php print theme('efed_result_item', $nodes['second_left'], 150); ?>
    </div>
    <div class="second_right">
        <?php print theme('efed_result_item', $nodes['second_right'], 150); ?>
    </div>
    <div class="clear"></div>
    <?php foreach($nodes['other'] as $count => $node): ?>
    <div class="other<?php print ($count == 2)? ' last' : ''; ?>">
        <?php print theme('efed_result_item', $node, 100); ?>
    </div>
    <?php endforeach; ?>
    <div class="clear"></div>
</div>
<?php else: ?>
<p><?php print t('No results at present.'); ?></p>
<?php endif; ?>