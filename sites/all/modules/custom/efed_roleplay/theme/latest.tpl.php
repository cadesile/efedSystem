<?php if($nodes): ?>
<div class="latest-roleplays">
    <?php if(is_object($nodes['first'])): ?>
    <div class="main">
        <?php print theme('efed_roleplay_item', $nodes['first'], 400, 'efed_roleplay_character_main'); ?>
    </div>
    <?php endif; ?>

    <?php if(is_object($nodes['second_left'])): ?>
    <div class="second_left">
        <?php print theme('efed_roleplay_item', $nodes['second_left'], 150); ?>
    </div>
    <?php endif; ?>

    <?php if(is_object($nodes['second_right'])): ?>
    <div class="second_right">
        <?php print theme('efed_roleplay_item', $nodes['second_right'], 150); ?>
    </div>
    <div class="clear"></div>
    <?php endif; ?>

    <?php if(is_array($nodes['other'])): ?>
    <?php foreach($nodes['other'] as $count => $node): ?>
    <div class="other<?php print ($count == 2)? ' last' : ''; ?>">
        <?php print theme('efed_roleplay_item', $node, 100); ?>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
    <div class="clear"></div>
</div>
<?php else: ?>
<p>Coming soon.</p>
<?php endif; ?>