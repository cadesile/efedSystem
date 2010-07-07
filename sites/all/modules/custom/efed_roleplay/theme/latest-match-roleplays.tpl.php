<?php if ($roleplays): ?>
<?php foreach ($roleplays as $roleplay): ?>

<?php $edit = (!$roleplay->roleplay_info->live)? l('Edit', 'roleplay/sketchbook/match/create/' . $roleplay->roleplay_info->match_id . '/' . $roleplay->roleplay_info->roleplay_id) : '<em>locked</em>'; ?>
        <tr class="roleplays">
            <td><?php print l(t($roleplay->title), 'node/' . $roleplay->nid); ?></td>
            <td><?php print efed_live($roleplay->roleplay_info->live); ?></td>
            <td><?php print format_date($roleplay->created, 'long'); ?></td>
            <td><?php print format_date($roleplay->changed, 'long'); ?></td>
            <td><?php print $edit; ?></td>
        </tr>
        <tr class="roleplay-info">
            <td colspan="5">
                <p>Time remaining <em><?php print $timeleft; ?></em>.</p>
                <p>So far your opponent(s) has/have written <?php print $opponent_roleplays['count']; ?> roleplays for this match.</p>
            </td>
        </tr>
<?php endforeach; ?>
<?php else: ?>
            <tr class="roleplay-info">
                <td colspan="5">
                    <p>You haven't written any roleplays for this match, you have <em><?php print $timeleft; ?></em> left before the roleplay deadline for this event passes.</p>
                    <p>So far your opponent(s) has/have written <?php print $opponent_roleplays['count']; ?> roleplays for this match.</p>
                </td>
            </tr>
<?php endif; ?>