<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

<?php print $picture ?>

<?php if ($page == 0): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>

  <p><b>Price</b>: $<?php print number_format($node->price, 2)?></p>

  <div class="content clear-block">
    <?php print $content ?>
  </div>
  <p><?php print drupal_get_form('efed_shop_buy_form', $node->shop_id); ?></p>

</div>
