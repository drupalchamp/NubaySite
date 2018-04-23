<?php
/**
 * @file
 * site_documentation.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function site_documentation_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function site_documentation_node_info() {
  $items = array(
    'site_documentation' => array(
      'name' => t('Site-Documentation'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
