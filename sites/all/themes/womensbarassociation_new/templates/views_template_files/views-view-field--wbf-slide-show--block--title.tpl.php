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

<div id="slideshow_box">
	<div class="image_box">
		<?php
			$alias = drupal_get_path_alias($node_obj->nid);
			if(!empty($node_obj->field_upload_image)){
				$image_settings = array(
				'style_name' => 'wba_slideshow',
				'path' => $node_obj->field_upload_image['und'][0]['uri'],
				'attributes' => array('class' => 'image'),
				'getsize' => TRUE,
				);
				$image_path = theme('image_style', $image_settings);
				$image= theme('image_style', $image_settings);
				
				if(!empty($node_obj->field_url_destination['und'][0]['value'])){
				  print l($image,$node_obj->field_url_destination['und']['0']['value'],array('html' => true));
				}else{
				  print l($image,'node/'.$alias,array('html' => true));
				}
				
			}
        ?>
    </div>
    <div class="desc_box">    
    	<div class="title_text"><?php 
		        if(!empty($node_obj->field_url_destination['und'][0]['value'])){
				  print l($node_obj->title,$node_obj->field_url_destination['und']['0']['value']);
				}else{
				  print l($node_obj->title,'node/'.$node_obj->nid);
				}
		 ?></div>
        <div class="desc_text">
		<?php 
		        if(!empty($node_obj->field_url_destination['und'][0]['value'])){
				  print l(@$node_obj->field_short_description['und']['0']['value'],$node_obj->field_url_destination['und']['0']['value']);
				}else{
				  print l(@$node_obj->field_short_description['und']['0']['value'],'node/'.$node_obj->nid); 
				}
		
		
		?>
        </div>    
    </div>
</div>
