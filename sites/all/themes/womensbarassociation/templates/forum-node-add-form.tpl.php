<?php
print drupal_render($form['form_build_id']);
print drupal_render($form['form_id']);
print drupal_render($form['form_token']);
print drupal_render($form['hidden']);

//print"<pre>";
//print drupal_render_children($form);
//print"</pre>";
?>

<div class="add_new_forum">
<h2 class="main_title">Add New Topic</h2>
<div class="forum_title"><?php print drupal_render($form['title']);?></div>
  <div class="forum_taxonomy_forums"><?php print drupal_render($form['taxonomy_forums']);?></div>
  <div class="forum_body"><?php print drupal_render($form['body']);?></div>
  <div class="forum_file"><?php print drupal_render_children($form['femail_files']);?></div>

  <div class="forum_button_area"><?php print drupal_render_children($form['actions']);?></div>
</div>