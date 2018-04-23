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
<?php if(arg(0) == 'node' && arg(1) == 'add' && arg(2) == 'forum'){  ?>
<h2 class="main_title">Add New Topic</h2>
<?php } ?>
<div class="forum_title"><?php print drupal_render($form['title']);?></div>
<?php if(arg(0) == 'node' && arg(1) == 'add' && arg(2) == 'forum'){  ?>
  <div class="forum_taxonomy_forums"><?php print drupal_render($form['taxonomy_forums']);?></div>
  <?php } ?>
  <div class="forum_body"><?php print drupal_render($form['body']);?></div>
  <div class="forum_file"><?php print drupal_render($form['femail_files']);?></div>

  <div class="forum_button_area"><?php print drupal_render_children($form['actions']);?></div>
</div>