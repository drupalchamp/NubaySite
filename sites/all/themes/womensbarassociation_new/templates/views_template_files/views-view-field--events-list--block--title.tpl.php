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
$node_obj=node_load($row->nid);
//print "<pre>";
//print_r($node_obj);
//print "</pre>";

?>
<div class="event_box">
	<?php if(!empty($node_obj->field_event_date['und'][0]['value'])): ?>
		<div class="date"><?php print date("l, F j, o", strtotime($node_obj->field_event_date['und'][0]['value'])); ?></div>
    <?php endif ;?>
    
    <div class="title_text"><?php print $node_obj->title; ?></div>
    
    <?php if(!empty($node_obj->field_event_address['und']['0']['value']) || !empty($node_obj->field_event_date['und'][0]['value'])) :?>
    	<div id="event_place_time">
			<?php if(!empty($node_obj->field_event_address['und']['0']['value'])){ 
                    print $node_obj->field_event_address['und']['0']['value'];
                }?>
            <span class="time">
                <?php 
                $dateString = $node_obj->field_event_date['und'][0]['value'];
                $dateObject = new DateTime($dateString);
                print $dateObject->format('h:i A');
                ?>
            </span> 
       </div>
     <?php endif; ?>
    <div class="detail_link"><?php print l('Click for Details','node/'.$node_obj->nid); ?></div>
</div>
