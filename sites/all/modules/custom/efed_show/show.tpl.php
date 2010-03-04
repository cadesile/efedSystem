<?php
	$c = efed_character_load($stable->owner);
?>
<div class="node">
	<h3><?php print $stable->name ?></h3>
	<div class="content">
		<p><b>Owner:</b> <?php print $c->name ?></p>
		<p><b>Members:</b></p>
		<?php foreach($stable->members as $m){ ?>
		<p><?php print $m->name ?></p>
		<?php } ?>
	</div>
</div>