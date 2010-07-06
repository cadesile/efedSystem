
<?php if($nodes): ?>
<div class="latest-shows">
    <div class="main">
        <?php print theme('efed_show_item', $nodes['first'], 400, 'efed_show_thumbnail', 'main'); ?>
    </div>
    <div class="main">
        <?php print theme('efed_show_item', $nodes['second'], 400, 'efed_show_thumbnail', 'main'); ?>
    </div>
    <?php if(is_object($nodes['third_left'])): ?>
    <div class="second_left">
        <?php print theme('efed_show_item', $nodes['third_left'], 150); ?>
    </div>
    <?php endif; ?>
    <?php if(is_object($nodes['third_right'])): ?>
    <div class="second_right">
        <?php print theme('efed_show_item', $nodes['third_right'], 150); ?>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
    <?php foreach($nodes['other'] as $count => $node): ?>
    <div class="other<?php print ($count == 2)? ' last' : ''; ?>">
        <?php print theme('efed_show_item', $node, 100); ?>
    </div>
    <?php endforeach; ?>
    <div class="clear"></div>
</div>
<?php else: ?>
<p>Coming soon.</p>
<?php endif; ?>