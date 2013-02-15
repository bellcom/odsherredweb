<div class="panel-display panel-node clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  
  <div class="panel-panel panel-region-stack1">
    <div class="inside"><?php print $content['stack1']; ?></div>
  </div>

  <?php if (!empty($content['stack2'])): ?>

  <div class="panel-panel panel-region-stack2">
  <div class="toggle-related"><i class="button bum"></i></div>
  
    <div class="inside"><?php print $content['stack2']; ?></div>
  </div>
<?php endif; ?>

  <div class="panel-panel panel-region-stack3">
    <div class="inside"><?php print $content['stack3']; ?></div>
  </div>

</div>
<div class="panel-panel panel-region-stack4">
  <div class="inside"><?php print $content['stack4']; ?></div>
</div>

