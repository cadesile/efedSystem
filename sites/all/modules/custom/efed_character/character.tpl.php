<?php
global $user;

$user = user_load($user->uid);

if(!$roster) {
    $roster = efed_roster_load($character->roster->roster_id);
}

$balance = $character->balance;
$contract = $character->contract;

$hasCharacter = ($character->character_id)? TRUE : FALSE;
$hasMultiCharacter = (count($user->profiles) > 1)? TRUE : FALSE;
$hasContractOffer = (($roster) && (!$contract->signed))? TRUE : FALSE;

$types = efed_character_status_types();

?>

<div class="character-small">
        <?php if($hasCharacter): ?>
	<div class="options">
		<?= l('edit', 'character-profiles/store/' . $character->character_id); ?> |
		<?= l('roleplay', 'roleplay/sketchbook'); ?> |
		<?= l('manage character(s)', 'character-profiles'); ?>
	</div>
	<div class="thumb">
		<?= theme('imagecache', 'efed_character_small', $character->img_thumbnail)?>
	</div>
	<div class="character-name"><?=$character->name?></div>
	<div class="real-name"><b>Name:</b> <?=$character->forename?> <?=$character->surname?></div>
	<?php if($roster && $contract->signed): ?>
	<div class="roster"><b>Roster:</b> <?=$roster->name?></div>
	<div class="contract"><b>Contract end:</b> <?=format_date($contract->date_end, 'small')?></div>
	<?php elseif($roster): ?>
	<div class="roster"><b>Roster:</b> <?=$roster->name?>*</div>
	<?php endif; ?>
	<?php if($balance): ?>
	<div class="balance"><b>Balance:</b> <?=efed_price($balance->balance)?></div>
	<?php endif; ?>
	<?php if($hasContractOffer): ?>
	<div class="offer">* contract offer, <?php print l(t('click here'), 'contract/' . $contract->contract_id); ?> to view.</div>
	<?php endif; ?>
        

        <?php if($hasMultiCharacter): ?>
	<?php print drupal_get_form('efed_character_default_form'); ?>
        <?php endif; ?>
        <?php else: ?>
        You're yet to create a character, <?php print l('click here', 'character-profiles/store'); ?> to create one.
        
        <?php endif; ?>

	<div class="clear"></div>
</div>