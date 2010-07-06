<?php
//print '<pre>';
//print_r($stable);
//print '</pre>';
//exit;

$c = efed_character_load($stable->owner);
?>
<div class="stable">
    <div class="stable-name"><?php print $stable->name ?></div>
    <div class="leader">
        <b>Owners</b>:
        <?php print theme('efed_author_pane', $c); ?>
    </div>
    <p><?php print $stable->note; ?></p>
    <div class="members">
        <b>Members:</b><br/>
        <?php foreach ($stable->members as $m): ?>
            <div class="member"><?php print theme('efed_author_pane', $m); ?></div>
        <?php endforeach; ?>
        <div class="clear"></div>
    </div>
</div>