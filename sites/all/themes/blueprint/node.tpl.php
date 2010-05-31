<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">

  <div class="content clear-block">
    <?php print $picture ?>
    <?php print $content ?>
  </div>

</div>