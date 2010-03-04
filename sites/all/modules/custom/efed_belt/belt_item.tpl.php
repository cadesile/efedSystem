<?php
	$c = efed_character_load($belt->current_champion->cid);
?>

<div class="node clear-block">
	<div class="content roster">
		<p class="type"><b>Title:</b> <?php print $belt->name; ?></p>
		<p class="type"><b>Holder:</b> <?php print $c->name; ?></p>
	</div>
</div>