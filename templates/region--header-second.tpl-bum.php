<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
  
  <?php
print theme('links__system_primary_menu', array(
          'links' => $primary_menu,
          'attributes' => array(
            'id' => 'primary-menu',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => $primary_menu_heading,
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        ));
        
print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => $secondary_menu_heading,
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        ));
        ?>
  
    <?php print $content; ?>
  </div>
</div>
