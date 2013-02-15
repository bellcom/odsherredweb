<?php

/**
 * Implements hook_panels_layouts().
 */
$plugin = array(
  'title' => t('Odsherred 3 Stack'),
  'category' => t('Odsherred'),
  'icon' => 'odsherred_3stack.png',
  'theme' => 'panels_odsherred_3stack',
  'theme arguments' => array('id', 'content'),
  'admin css' => 'os2web_3stack_admin.css',
  'regions' => array(
    'stack1' => t('Top'),
    'stack2' => t('Midt'),
    'stack3' => t('Bund'),
    'stack4' => t('Udenfor stack'),
  ),
);
