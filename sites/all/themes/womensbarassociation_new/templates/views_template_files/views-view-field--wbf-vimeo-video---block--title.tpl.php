<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>

<?php

$node_obj = node_load($row->nid);
//print "<pre>";
//print_r($node_obj);
//print"</pre>"; 

?>
<div class="vimeo_video">
    <embed src="https://vimeo.com/moogaloop.swf?clip_id=<?php print $node_obj->field_vimeo_video_id['und'][0]['value'];?>&server=vimeo.com&show_title=1&show_byline=1&show_portrait=0&color=00adef&fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="480" height="360"></embed>
</div>


<div class="vimeo_video_disc">
	<?php 
	 if(!empty($node_obj->field_video_short_description['und'][0]['value'])){
	      print $node_obj->field_video_short_description['und'][0]['value'];
	 }
	?>
</div>
