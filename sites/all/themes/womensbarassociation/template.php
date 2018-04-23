<?php
/**
 * Override of theme_breadcrumb().
 */
function womensbarassociation_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '
	<span class="active">'. drupal_get_title() .'</span>
	</div>';
    return $output;
  }
}

function womensbarassociation_theme() {
 return array(
 'follow_my_order_node_form' => array('arguments' => array('form' => NULL),'template' => 'templates/follow_my_order_add','render element' => 'form',),
 'industrial_design_node_form' => array('arguments' => array('form' => NULL),'template' => 'templates/industrial_design_add','render element' => 'form',),
 'new_projects_node_form' => array('arguments' => array('form' => NULL),'template' => 'templates/new_projects_add','render element' => 'form',),
 'user_login_form' => array('arguments' => array('form' => NULL),'template' => 'templates/user-login-form','render element' => 'form',),
 'user_password_form' => array('arguments' => array('form' => NULL),'template' => 'templates/user-password-form','render element' => 'form',),
 'user_register_form' => array('arguments' => array('form' => NULL),'template' => 'templates/user-register-form','render element' => 'form',),
 'user_edit_form' => array('arguments' => array('form' => NULL),'template' => 'templates/user-edit-form','render element' => 'form',),
 'commerce_checkout_form_review' => array('arguments' => array('form' => NULL),'template' => 'templates/commerce-checkout-review_add','render element' => 'form',),
 'forum_node_form' => array('arguments' => array('form' => NULL),'template' => 'templates/forum-node-add-form','render element' => 'form',),
 );
}



/**
 * Override or insert variables into the maintenance page template.
 */

function womensbarassociation_preprocess_maintenance_page(&$vars) {
  // While markup for normal pages is split into page.tpl.php and html.tpl.php,
  // the markup for the maintenance page is all in the single
  // maintenance-page.tpl.php template. So, to have what's done in
  // womensbarassociation_preprocess_html() also happen on the maintenance page, it has to be
  // called here.
  womensbarassociation_preprocess_html($vars);
}

/**
 * Override or insert variables into the html template.
 */

function womensbarassociation_preprocess_html(&$vars) {
  // Toggle fixed or fluid width.
  if (theme_get_setting('womensbarassociation_width') == 'fluid') {
    $vars['classes_array'][] = 'fluid-width';
  }
  // Add conditional CSS for IE6.
  drupal_add_css(path_to_theme() . '/fix-ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));

}

/**
 * Override or insert variables into the html template.
 */
function womensbarassociation_process_html(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_html_alter($vars);
  }
}

/**

 * Override or insert variables into the page template.
 */


function womensbarassociation_preprocess_page(&$vars) {
	if(isset($vars['node']->type)) {
        $nodetype = $vars['node']->type;
        $vars['theme_hook_suggestions'][] = 'page__' . $nodetype;
	}

	// Move secondary tabs into a separate variable.
  $vars['tabs2'] = array(
    '#theme' => 'menu_local_tasks',
    '#secondary' => $vars['tabs']['#secondary'],
  );
  unset($vars['tabs']['#secondary']);
  if (isset($vars['main_menu'])) {
    $vars['primary_nav'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'main-menu'),
      ),

     'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['primary_nav'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_nav'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
       'class' => array('links', 'inline', 'secondary-menu'),
      ),
     'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )

    ));

  }

  else {
    $vars['secondary_nav'] = FALSE;

 }
  // Prepare header.
  $site_fields = array();
  if (!empty($vars['site_name'])) {
    $site_fields[] = $vars['site_name'];
  }
  if (!empty($vars['site_slogan'])) {
      $site_fields[] = $vars['site_slogan'];
  }
  $vars['site_title'] = implode(' ', $site_fields);
  if (!empty($site_fields)) {
    $site_fields[0] = '<span>' . $site_fields[0] . '</span>';
  }
  $vars['site_html'] = implode(' ', $site_fields);

  // Set a variable for the site name title and logo alt attributes text.
  $slogan_text = $vars['site_slogan'];
  $site_name_text = $vars['site_name'];
  $vars['site_name_and_slogan'] = $site_name_text . ' ' . $slogan_text;
}

/**
 * Override or insert variables into the node template.
 */

function womensbarassociation_preprocess_node(&$vars) {
  $vars['submitted'] = $vars['date'] . ' — ' . $vars['name'];
}

/**
 * Override or insert variables into the comment template.
 */

function womensbarassociation_preprocess_comment(&$vars) {
  $vars['submitted'] = $vars['created'] . ' — ' . $vars['author'];
}

/**
 * Override or insert variables into the block template.
 */

function womensbarassociation_preprocess_block(&$vars) {
  $vars['title_attributes_array']['class'][] = 'title';
  $vars['classes_array'][] = 'clearfix';
}

/**
* Override or insert variables into the page template.
*/
function womensbarassociation_process_page(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

/**
 * Override or insert variables into the region template.
 */
function womensbarassociation_preprocess_region(&$vars) {
  if ($vars['region'] == 'header') {
    $vars['classes_array'][] = 'clearfix';
  }
}
function womensbarassociation_date_combo($variables) {
  return theme('form_element', $variables);
} 
