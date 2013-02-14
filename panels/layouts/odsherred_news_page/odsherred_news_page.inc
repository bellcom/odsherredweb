<?php

/**
 * Implements hook_panels_layouts().
 */
$plugin = array(
  'title' => t('Odsherred Newspage'),
  'category' => t('Odsherred'),
  'icon' => 'odsherred_news_page.png',
  'theme' => 'panels_odsherred_news_page',
  'theme arguments' => array('id', 'content'),
  'admin css' => 'os2web_news_page_admin.css',
  'regions' => array(
    'top' => t('Top'),
    'left' => t('Left'),
    'right' => t('Right'),
  ),
);
