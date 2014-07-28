<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>


<div class="topborgerdk">
<div class="node-print"><a href="/print/<?php print $node->nid; ?>" target="_blank" title="Undskriv">Udskriv</a></div>
<?php print render($region['preface_first']); ?>
</div>

    <h1 class="title" id="page-title"><?php print $title; ?></h1>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="meta submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
  <?php
    if (!empty($content['field_billede'])) {
      print "<div class='billede'>";
      print render($content['field_billede']);
      print "</div>";
      hide($content['field_billede']);
    }
    
      if (!empty($content['field_os2web_borger_dk_header'])) {
      print "<div class='borger_dk_header'>";
      print render($content['field_os2web_borger_dk_header']);
      print "</div>";
      hide($content['field_os2web_borger_dk_header']);
    }

  ?>
  
  <div class="content clearfix"<?php print $content_attributes; ?>>
  
 <?php
          
    if (!empty($content['field_os2web_borger_dk_selfservi'])) {
      print "<div class='panel-panel panel-region-stack2 gul-boks'>
             <div class='toggle-related'><i class='button bum'></i></div>
              <div class='inside'>";
      print render($content['field_os2web_borger_dk_selfservi']);
      print '</div>
            </div>';
      hide($content['field_os2web_borger_dk_selfservi']);
    }

  ?>
  <div class="content clearfix"<?php print $content_attributes; ?>>
  <?php
  
  if (!empty($content['field_os2web_borger_dk_pre_text'])) {
      print "<div class='borger_dk_pre-text'>";
      print render($content['field_os2web_borger_dk_pre_text']);
      print "</div>";
      hide($content['field_os2web_borger_dk_pre_text']);
    }


    if (!empty($content['body'])) {
      $show_div = $node->body['und']['0']['value'];
      $show_div = str_replace("</h2>","</h2><a href='#' class='gplus'>+</a>",$show_div);
      $content['body'] = $show_div;
      print "<div class='panel-panel panel-region-stack3'>
                <div class='inside'>
                  <div class='panel-pane pane-entity-field pane-node-body node-body'>";
      print render($content['body']);
      print '</div>';
      print "<div class='panel-separator'></div>";
      hide($content['body']);
      if (!empty($content['field_os2web_borger_dk_legislati'])) {
        print "<div class='panel-pane pane-entity-field pane-node-field_os2web-borger-dk-legislati'>";
        print render($content['field_os2web_borger_dk_legislati']);
        print "</div>";
        hide($content['field_os2web_borger_dk_legislati']);
      }
      print "</div></div></div>";
    }
    if (!empty($content['field_os2web_borger_dk_recommend'])) {
      print " <div class='panel-panel panel-region-stack4'";
      print "<div class= 'inside'>";
      print "<div class='panel-pane pane-entity-field pane-node-field_os2web-borger-dk-recommend'>";
      print render($content['field_os2web_borger_dk_recommend']);
      print "</div>";
      print "<div class='panel-separator'></div>";
      hide($content['field_os2web_borger_dk_recommend']);
      if (!empty($content['field_os2web_borger_dk_shortlist'])) {
        print "<div class='panel-pane pane-entity-field pane-node-field_os2web-borger-dk-recommend'> ";
        print render($content['field_os2web_borger_dk_shortlist']);
        hide($content['field_os2web_borger_dk_shortlist']);
        print "</div>";
      }
      print "</div></div></div>";
    }

      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php
    // Remove the "Add new comment" link on the teaser page or if the comment
    // form is being displayed on the same page.
    if ($teaser || !empty($content['comments']['comment_form'])) {
      unset($content['links']['comment']['#links']['comment-add']);
    }
    // Only display the wrapper div if there are links.
    $links = render($content['links']);
    if ($links):
  ?>
    <div class="link-wrapper">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</div>
