<?php if ($matches): ?>
<?php foreach ($matches as $match): ?>
        <table class="latest-match">
            <tr>
                <th>Card</th>
                <th>Competitors</th>
                <th>Deadline</th>
                <th>Roleplay Limit*</th>
                <th></th>
            </tr>
            <tr class="match">
                <td><?php print $match['card']; ?></td>
                <td><?php print $match['competitors']; ?></td>
                <td><?php print $match['deadline']; ?></td>
                <td><?php print $match['limit']; ?></td>
                <td><?php print $match['create']; ?></td>
            </tr>
            <tr>
                <th>Roleplay Title</th>
                <th>Live</th>
                <th>Created</th>
                <th>Last Edited</th>
                <th></th>
            </tr>
    <?php print theme('efed_roleplay_latest_match_roleplays', $match['roleplays'], $match['timeleft'], $match['opponent_roleplays']); ?>
    </table>
<?php endforeach; ?>
<?php else: ?>
            <p>The character, <b><?php print efed_character()->name; ?></b> hasn't got any matches, <?php print l(t('click here'), 'roleplay/sketchbook/creative/create/'); ?> to write a <em>creative</em> roleplay for this character.</p>
<?php endif; ?>

            <div class="global-note">
                <p>* Only live roleplays count.</p>
            </div>