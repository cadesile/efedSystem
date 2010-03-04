<?php
	switch($type){

		case 'rules':
?>

<div class="match">	
	<?php if($match->title>0):?>
	<div class="belt"><b>Title</b>: <?php print  efed_belt_load($match->title)->name; ?></div>
	<?php endif;?>
	
	<?php if($match->display_rules):?>
	<div class="rules"><b>Rules</b>: <?php print  taxonomy_get_term($match->rules)->name; ?></div>
	<?php endif;?>
	
	<div class="referee"><b>referee:</b> <?php print  taxonomy_get_term($match->referee)->name; ?></div>
</div>
<?php
		break;

		case 'small':
?>

<div class="match">
	<?php if($title):?>
	<div class="title"><?php print $title; ?></div>	
	<?php endif;?>
	
	<?php if($match->title>0):?>
	<div class="belt"><?php print  efed_belt_load($match->title)->name; ?></div>
	<?php endif;?>
	
	<div class="match_title"><?php print $match->match_title; ?></div>
	
	<?php if($match->display_rules):?>
	<div class="rules"><em><?php print  taxonomy_get_term($match->rules)->name; ?></em></div>
	<?php endif;?>
</div>
<?php
		break;
		
		case 'long':
		
		break;
		
		default:
?>

<div class="match">
	<?php
	if($title){
	?>
	<h2><?php print $title; ?></h2>
	<p><?php print $match->match_title; ?></p>	
	<?php
	}else{
	?>
	<h2><?php print $match->match_title; ?></h2>
	<?php
	}
	?>
	<p>
	This match will be refereed by <?php print  taxonomy_get_term($match->referee)->name; ?><?php if($match->title>0) { ?>, and the <?php print  efed_belt_load($match->title)->name; ?> title will be on the line<?php } ?><?php if($match->display_rules){?>. The rules for the match are <em><?php print  taxonomy_get_term($match->rules)->name; ?></em><?php } ?>.
	</p>		
</div>
<?php
		break;
	}
?>
