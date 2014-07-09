<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */

/**
 * implements hook_preprocess_page()
 *
 **/

function odsherredweb_preprocess_page(&$variables, $hook) {
  // Add the site structure term id to the page div
  $node = node_load(arg(1));

  if(is_object($node) && isset($node->field_site_structure))
  {
    $termParents = taxonomy_get_parents($node->field_site_structure[LANGUAGE_NONE][0]['tid']);
    $termId = 'tid-'.$node->field_site_structure[LANGUAGE_NONE][0]['tid'];
    $termIdParent = "";
    if(!empty($termParents))
    {
      $termIdParent = 'tid-'.key($termParents);  
    }

    $variables['attributes_array']['class'] = $termIdParent . ' ' . $termId;
  }
}

function odsherredweb_image_style($variables) {
  // Determine the dimensions of the styled image.
  $dimensions = array(
    'width' => $variables['width'], 
    'height' => $variables['height'],
  );

  image_style_transform_dimensions($variables['style_name'], $dimensions);

  $variables['width'] = $dimensions['width'];
  $variables['height'] = $dimensions['height'];

  $variables['attributes'] = array(
    'class' => $variables['style_name'],
  );

  // Determine the url for the styled image.
  $variables['path'] = image_style_url($variables['style_name'], $variables['path']);
  return theme('image', $variables);
}

/**
 * Implements hook_form_alter().
 */
function odsherredweb_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#attributes']['placeholder'] = t('Hvad kan vi hjælpe med?');
    $form['actions']['submit']['#attributes']['title'] = t('Search');
  }
  if ($form_id == 'apachesolr_search_custom_page_search_form') {
    $form['basic']['keys']['#attributes']['title'] = t('Search');
  }
  if( $form_id == 'contentpage_node_form') {
    foreach( $form['field_billede'][LANGUAGE_NONE] as $key => $value)
    {
      if(is_numeric($key)){
        $form['field_billede'][LANGUAGE_NONE][$key]['#validate'] = array('odsherredweb_image_alt_text_required_validate');
        $form['field_billede'][LANGUAGE_NONE][$key]['#element_validate'] = array('odsherredweb_image_alt_text_required_validate');
      }
    }
  }
}

/**
 * Custom quick and dirty form validation
 *
 * if the alternative text field is empty, we return an error
 */
function odsherredweb_image_alt_text_required_validate(&$form, &$form_state, $form_id){
  if(!empty($form_state['input']['field_billede'][LANGUAGE_NONE]))
  {
    foreach( $form_state['input']['field_billede'][LANGUAGE_NONE] as $key => $value) {

      if(isset($value['alt'])){
        if(empty($value['alt'])){
          form_set_error('', 'Alternativ tekst er obligatorisk');
        }
      }
      // uncomment if title has to be required as well
      //if(!isset($value['title'])){
        //if(empty($value['title'])){
        //form_set_error('', 'title skal indtastes');
        //}
      //}
    
    } 
  } 
}

function odsherredweb_preprocess_node(&$variables) {

  // Get a list of all the regions for this theme
  foreach (system_region_list($GLOBALS['theme']) as $region_key => $region_name) {

    // Get the content for each region and add it to the $region variable
    if ($blocks = block_get_blocks_by_region($region_key)) {
      $variables['region'][$region_key] = $blocks;
    }
    else {
      $variables['region'][$region_key] = array();
    }
  }
}

/**
 * implements theme_links__system_main_menu()
 */
function odsherredweb_links__system_main_menu($variables) {
  $html = '<ul id="main-menu" class="links inline clearfix main-menu">';

  $items = array('first', '', 'last');

  foreach( array_shift($variables) as $key => $link) {
    $html .= '<li class="' . $key . ' ' . array_shift($items) .  '"><a href="' . $link['href'] . '" title="' . $link['title']. '" class="portal-link">' . $link['title']. '</a><a href="" class="js-menu-minipanel-toggle '._menu_minipanels_include($link['minipanel'], $link['menu_minipanels_hover']) .'"></a> </li>';
  }
  return $html;
}
