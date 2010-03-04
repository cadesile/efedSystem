<?php
?>

<div class="node clear-block">
	<div class="content show">
		<h3><?php print l($show->title,'node/'.$show->nid); ?></h3>
		<p class="type"><b>Type:</b> <?php print $show->type_term->name; ?></p>
		<p>
			<?php
			if($show->banner){
				print theme('imagecache','efed_thumbnail',$show->banner,$show->title);
			}
			?>
			<?php print $show->description; ?>
		</p>
	</div>
</div>