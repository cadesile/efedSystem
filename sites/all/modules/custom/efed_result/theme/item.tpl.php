<div class="result">
    <h3><?php print l($node->title, 'node/' . $node->nid); ?></h3>
    <p><?php print truncate_utf8(strip_tags($node->body), $truncate, TRUE, TRUE); ?></p>
    <div class="clear"></div>
</div>
