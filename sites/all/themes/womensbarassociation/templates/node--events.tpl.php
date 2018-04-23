<?php
//print '<pre>';
//print_r($node);
//print '</pre>';
?>
<script type="text/javascript" src="https://addthisevent.com/libs/1.6.0/ate.min.js"></script>
<div id="upcoming_event">
	<div class="event_title"><?php print $node->title ?></div>
   
    <div class="event_date"><label>When:</label><?php print date('l, M j, o,  ',strtotime($node->field_event_date['und'][0]['value']))?>
    	 <span class="time">
                <?php 
                $dateString = $node->field_event_date['und'][0]['value'];
                $dateObject = new DateTime($dateString);
                print $dateObject->format('h:i A');
                ?>
                
                <?php if(!empty($node->field_event_date['und'][0]['value2'])){
                $dateString = $node->field_event_date['und'][0]['value2'];
                $dateObject = new DateTime($dateString);
                print "  until  ".$dateObject->format('h:i A');
				}
                ?>
                
            </span> 
    </div>
    <?php if(!empty($node->field_event_address['und'][0]['value'])):?>
    	<div class="event_address"><label>Where:</label><?php print $node->field_event_address['und'][0]['value'] ?></div>
    <?php endif; ?>
    <?php if(!empty($node->field_event_short_description['und'][0]['value'])) :?>
    	<div class="event_desc"><?php print $node->field_event_short_description['und'][0]['value'] ?></div>
    <?php endif; ?>
    <div class="register_detail">
    		<div class="left">
                
            </div>
            <div class="right">
            	<?php if(!empty($node->field_registration_link['und'][0]['value'])) :?>
            		<div class="register"><?php print l('',$node->field_registration_link['und'][0]['value']); ?></div>
                <?php endif; ?>
               <div class="calender">
               		<div title="Add to Calendar" class="addthisevent">
               			<a href="#"></a>Add to My Calendar
                         <span class="start"><?php print $node->field_event_date['und'][0]['value'];?></span>
                        <span class="end"><?php print $node->field_event_date['und'][0]['value2'];?></span>
                        <span class="timezone"><?php print $node->field_event_date['und'][0]['timezone'];?></span>
                        <span class="title"><?php print $node->title; ?></span>
                        <span class="description"><?php print $node->field_event_short_description['und'][0]['value']?></span>
                        <span class="location"><?php print $node->field_event_address['und'][0]['value'] ?></span>
                        <span class="date_format">MM/DD/YYYY</span>
                    </div> 
               </div>
            </div>
    </div>
  	<?php if(!empty($node->body['und'][0]['value'])) : ?>
    	<div class="full_description"><?php print $node->body['und'][0]['value'] ?></div>
    <?php endif; ?>
    
 </div>