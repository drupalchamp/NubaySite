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
<script type="text/javascript" src="https://addthisevent.com/libs/1.6.0/ate.min.js"></script>
<div id="upcoming_event">
	<div class="event_title"><?php print l($node_obj->title,'node/'.$node_obj->nid); ?></div>
    
 <?php if(!empty($node_obj->field_event_date['und'][0]['value'])){  ?>
    <div class="event_date"><label>When:</label><?php print date('l, F j, Y, ',strtotime($node_obj->field_event_date['und'][0]['value']))?>
    	 <span class="time">
                <?php 
				if(date('hi',strtotime($node_obj->field_event_date['und'][0]['value'])) != '1200'){
				  print date('g:i A',strtotime($node_obj->field_event_date['und'][0]['value']));
				}
                ?> 
          <?php 
		  if(!empty($node_obj->field_event_date['und'][0]['value2'])){
		    if($node_obj->field_event_date['und'][0]['value'] != $node_obj->field_event_date['und'][0]['value2']){
			if(date('MjY',strtotime($node_obj->field_event_date['und'][0]['value'])) != date('MjY',strtotime($node_obj->field_event_date['und'][0]['value2']))){
				print " until ".date('l, F j, Y, g:i A',strtotime($node_obj->field_event_date['und'][0]['value2']));
			}elseif(date('hi',strtotime($node_obj->field_event_date['und'][0]['value2'])) != '1200'){
				  print " until ".date('g:i A',strtotime($node_obj->field_event_date['und'][0]['value2']));
			}

			}
		}
                ?>
                
            </span> 
    </div>
    <?php } ?>
   
    <?php if(!empty($node_obj->field_event_short_description['und'][0]['value'])) :?>
    	<div class="event_desc"><?php print $node_obj->field_event_short_description['und'][0]['value'] ?></div>
    <?php endif; ?>
    <div class="register_detail">
    		<div class="left">
                
            </div>
            <div class="right">
            <div class="register">
            	<?php if(!empty($node_obj->field_registration_link['und'][0]['value'])) :?>
            		<?php print l('',$node_obj->field_registration_link['und'][0]['value']); ?>
                <?php endif; ?>&nbsp;
             </div>
               <div class="calender">
               		<div title="Add to Calendar" class="addthisevent">
               			<a href="#"></a>Add to My Calendar
                         <span class="start"><?php print $node_obj->field_event_date['und'][0]['value'];?></span>
                        <span class="end"><?php print $node_obj->field_event_date['und'][0]['value2'];?></span>
                        <span class="timezone"><?php print $node_obj->field_event_date['und'][0]['timezone'];?></span>
                        <span class="title"><?php print $node_obj->title; ?></span>
                        <span class="description"><?php print @$node_obj->field_event_short_description['und'][0]['value']?></span>
                        <span class="location"><?php print @$node_obj->field_event_address['und'][0]['value'] ?></span>
                        <span class="date_format">MM/DD/YYYY</span>
                    </div> 
               </div>
            </div>
    </div>
  	    
 </div>

