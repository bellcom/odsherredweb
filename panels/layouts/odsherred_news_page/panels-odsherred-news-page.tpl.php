<div class="panel-display container-12 panel-node clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="panel-panel grid-12 alpha omega panel-region-lead">
    <div class="inside"><?php print $content['top']; ?></div>
  </div>

  <div class="panel-panel grid-8 alpha panel-region-middle-center">
    <div class="inside"><?php print $content['left']; ?></div>
  </div>

  <div class="panel-panel grid-4 omega panel-region-middle-right">
    <div class="inside"><?php print $content['right']; ?></div>
  </div>
</div>
