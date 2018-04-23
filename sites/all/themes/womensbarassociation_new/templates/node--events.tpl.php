<?php
//print '<pre>';
//print_r($node);
//print '</pre>';
?>
<script type="text/javascript" src="https://addthisevent.com/libs/1.6.0/ate.min.js"></script>
<div id="upcoming_event">
	<div class="event_title"><?php print $node->title; ?></div>
   
     <?php if(!empty($node->field_event_date['und'][0]['value'])){  ?>
    <div class="event_date"><label>When:</label><?php print date('l, F j, Y, ',strtotime($node->field_event_date['und'][0]['value']))?>
    	 <span class="time">
                <?php 
				if(date('hia',strtotime($node->field_event_date['und'][0]['value'])) != '1200am'){
				  print date('g:i A',strtotime($node->field_event_date['und'][0]['value']));
				}
                ?> 
          <?php 
		  if(!empty($node->field_event_date['und'][0]['value2'])){
		    if($node->field_event_date['und'][0]['value'] != $node->field_event_date['und'][0]['value2']){
			if(date('MjY',strtotime($node->field_event_date['und'][0]['value'])) != date('MjY',strtotime($node->field_event_date['und'][0]['value2']))){
				print " until ".date('l, F j, Y, g:i A',strtotime($node->field_event_date['und'][0]['value2']));
			}elseif(date('hia',strtotime($node->field_event_date['und'][0]['value2'])) != '1200am'){
				  print " until ".date('g:i A',strtotime($node->field_event_date['und'][0]['value2']));
			}

			}
		}
                ?>
                
            </span> 
    </div>
    <?php } ?>
    
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
																								<?php if(!empty($node->field_event_short_description)) :?>
                          <span class="description"><?php print $node->field_event_short_description['und'][0]['value']?></span>
																								<?php endif; ?>
																								<?php if(!empty($node->field_event_address)) :?>
                          <span class="location"><?php print $node->field_event_address['und'][0]['value'] ?></span>
																								<?php endif; ?>
                        <span class="date_format">MM/DD/YYYY</span>
                    </div> 
               </div>
            </div>
    </div>
  	<?php if(!empty($node->body['und'][0]['value'])) : ?>
    	<div class="full_description"><?php print $node->body['und'][0]['value'] ?></div>
    <?php endif; ?>
    
 </div>
