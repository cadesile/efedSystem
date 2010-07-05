<?php
$roleplay = $node->roleplay_info;
$character = efed_character_load($roleplay->cid);
$match = ($roleplay->type == 'match') ? efed_match_load($roleplay->match_id) : NULL;
?>

<div class="roleplay">
    <div class="character">
<?php print theme('imagecache', $imagecache, $character->img_thumbnail); ?>
        <div class="author"><em><?php print $character->name; ?></em></div>
    </div>
    <h3><?php print l($node->title, 'node/' . $node->nid); ?></h3>
<?php if ($roleplay->type == 'match'): ?>
        <div class="details">
            <b>Match</b>: <?php print $match->match_title; ?>
            </div>
<?php else: ?>
                <div class="details"><b>Type</b>: Creative Roleplay</div>
<?php endif; ?>

                <p><?php print truncate_utf8(strip_tags($node->body), $truncate, TRUE, TRUE); ?></p>
    <div class="clear"></div>
</div>
