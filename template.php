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
  }
  if( $form_id == 'contentpage_node_form') {
    foreach( $form['field_billede'][LANGUAGE_NONE] as $key => $value)
    {
      if(is_numeric($key)){
        $form['field_billede'][LANGUAGE_NONE][$key]['#validate'] = array('odsherredweb_image_alt_text_required_validate');
        $form['field_billede'][LANGUAGE_NONE][$key]['#element_validate'] = array('odsherredweb_image_alt_text_required_validate');
      }
    }
    $form['#validate'][] = 'odswerredweb_content_node_form_validate';
  }
}

/**
 * Implements hook_form_validate().
 */
function odswerredweb_content_node_form_validate($form, &$form_state){
  global $user;

  if(!user_access('administer site configuration') && !in_array('Administrator', $user->roles) && !in_array('Webmaster', $user->roles)){
    //drupal_set_message(print_r($form_state['input']['field_termref_sted']['und']['value_field'], TRUE));
    $sted_input = explode(' ', $form_state['input']['field_termref_sted']['und']['value_field']);

    foreach($sted_input as $sted){
      $sted = str_replace('"', "", $sted);
      if (empty($sted))
	continue;
      $sted_term = taxonomy_get_term_by_name($sted,'egennavne_stednavne');
      if (empty($sted_term)){
	form_set_error('field_termref_sted', $sted . ': ' . t('Du kan kun væge de eksisterende navne'));
      }
    }

    //drupal_set_message(print_r($form_state['input']['field_organization']['und']['value_field'], TRUE));
    $org_input = explode(' ', $form_state['input']['field_organization']['und']['value_field']);

    foreach($org_input as $org){
      $org = str_replace('"', "", $org);
      if (empty($org))
	continue;
      $org_term = taxonomy_get_term_by_name($org,'organisation');
      if (empty($org_term)){
	form_set_error('field_organization', $org . ': ' . t('Du kan kun vælge de eksisterende organisationer'));
      }
    }

    //drupal_set_message(print_r($form_state['input']['field_politics']['und']['value_field'], TRUE));
    $politics_input = explode(' ', $form_state['input']['field_politics']['und']['value_field']);

    foreach($politics_input as $politics){
      $politics = str_replace('"', "", $politics);
      if (empty($politics))
	continue;
      $politics_term = taxonomy_get_term_by_name($politics,'politik');
      if (empty($politics_term)){
	form_set_error('field_politics', $politics . ': ' . t('Du kan kun vælge de eksisterende politikker'));
      }
    }
    
    if (!in_array('Webredaktør', $user->roles)){
      $stikord_input = explode(' ', $form_state['input']['field_editortags']['und']['value_field']);

      foreach($stikord_input as $stikord){
	$stikord = str_replace('"', "", $stikord);
	if (empty($stikord))
	  continue;
	$stikord_term = taxonomy_get_term_by_name($stikord,'redaktoertags');
	if (empty($$stikord_term)){
	  form_set_error('field_editortags', $stikord . ': ' . t('Du kan kun vælge de eksisterende stikorde'));
	}
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
