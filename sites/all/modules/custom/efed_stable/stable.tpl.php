<?php
	$c = efed_character_load($stable->owner);
?>
<div class="stable">
	<div class="stable-name"><?php print $stable->name ?></div>
	<div class="leader"><b>Owner:</b> <?php print $c->name ?></div>
	<div class="members">
		<b>Members:</b>
		<?php foreach($stable->members as $m): ?>
		<div class="member"><?php print $m->name ?></div>
		<?php endforeach; ?>
	</div>
</div>