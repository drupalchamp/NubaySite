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
$id = arg(1);
$query = "SELECT DISTINCT * FROM {civicrm_contact} civicrm_contact
LEFT JOIN {civicrm_value_additional_information_14} civicrm_value_additional_information_14 ON civicrm_contact.id = civicrm_value_additional_information_14.entity_id
LEFT JOIN {civicrm_email} civicrm_email ON civicrm_contact.id = civicrm_email.contact_id
LEFT JOIN {civicrm_phone} civicrm_phone ON civicrm_contact.id = civicrm_phone.contact_id
LEFT JOIN {civicrm_address} civicrm_address ON civicrm_contact.id = civicrm_address.contact_id
LEFT JOIN {civicrm_state_province} civicrm_state_province ON civicrm_address.state_province_id = civicrm_state_province.id
WHERE (( (civicrm_contact.id =" .$id." ) )AND(( (civicrm_value_additional_information_14.list_me_in_the_referral_director_81 <> '0') )))

" ; 

			
$results = db_query($query);

foreach ($results as $record) {
// print '<pre>';
 //print_r($record);
 //print '</pre>';
}

?>
  
<?php 
	   $visibility = $record->directory_visibility_129;
?>
<div id="attorney_detail">
  <div class="full_detail">
    <div class="attorney_image">
    <?php 
	 if (strpos($visibility,'picture') !== false || strpos($visibility,'show-all') !== false) {
	   $user_obj = @user_load($record->contact_id);
	   if(!empty($user_obj)){
	     print views_embed_view('forum_author_details', 'block',$record->contact_id);
	   }else{
	     print '<img src="/sites/default/files/no_bio_photo.gif" />' ;
	   }
	 } else {
	   print '<img src="/sites/default/files/no_bio_photo.gif" />' ;	
	 }?>
	</div>
    
    <div class="details">
      <?php if (strpos($visibility,'name-address') !== false || strpos($visibility,'show-all') !== false) {?>
       <div class="address u">
        <table>
          <tr>
            <td><?php print '<span>Name</span>' ;?></td>
            <td><?php print @$record->display_name ;?></td>
          </tr>
          <tr>
            <td><?php print '<span>Address</span>' ;?></td>
            <td><?php print @$record->street_address ;?></td>
         </tr>
         <tr>
          <td></td>
          <td><?php print @$record->supplemental_address_1 ;?></td>
         </tr>
         <tr>
          <td></td>
          <td><?php print @$record->supplemental_address_2 ;?></td>
         </tr>
         <tr>
          <td></td>
          <td><?php print @$record->supplemental_address_3 ;?></td>
         </tr>
       </table>
     </div>
        <div class="city_state u">
        <table>
        <tr>
          <td><?php print '<span>City</span>' ;?></td>
           <td><?php print @$record->city ;?></td>
        </tr>
        <tr>
          <td><?php print '<span>State/Province</span>' ;?></td>
          <td><?php print @$record->name ;?></td>
        </tr>
        </table>
      </div>
      <?php }?>
      
      <?php if (strpos($visibility,'title') !== false || strpos($visibility,'show-all') !== false) {?>
      <div class="organization u"> 
        <table>
          <tr>
          <td><?php print '<span>Job Title</span>' ;?></td>
          <td><?php print @$record->job_title ;?></td>
          </tr>
        </table>
        </div>
      <?php } ?>
         
      <?php 
	    if (strpos($visibility,'show-all') !== false) { ?>
        <div class="organization u">  
        <table>
         <tr>
          <td><?php print '<span>Other Bar Association Memberships</span>' ;?></td>
          <td><?php print @$record->list_your_other_bar_and_professi_63 ;?></td>
        </tr>
        <tr>
          <td><?php print '<span>Employer Type</span>' ;?></td>
          <td><?php print @$record->employer_type_61 ;?></td>
        </tr>             
        <tr>
          <td><?php print '<span>Gender</span>' ;?></td>
          <td><?php 
		          switch(@$record->gender_id){
				    case "1":
					  echo "Female";
					  break;
				    case "2":
					   echo "Male";
					   break;
					case "3":
					    echo "Transgender";
						break;
					case "4":
					    echo "Other";
						break;
					default:
                       echo "";
				  }
			 ?>
          </td>
        </tr>
        <tr>
        <td><?php print '<span>Social Links</span>' ;?></td>
         <td>
           <ul>
             <li class="fb"><?php print l('fb','http://'.@$record->facebook__76 );?></li>
             <li class="tw"><?php print  l('tw','http://www.twitter.com/'.@$record->twitter__75) ;?></li>
             <li class="in"><?php print  l('in','http://'.@$record->linkedin__74 );?></li>
          </ul>
         </td>
        </tr> 
        </table>
        
        </div>	
	   <?php  } ?>
       
       <?php if (strpos($visibility,'company') !== false || strpos($visibility,'show-all') !== false) {?>
       <div class="organization u"> 
        <table>
          <tr>
          <td><?php print '<span>Firm/Organization</span>' ;?></td>
          <td><?php print @$record->organization_name ;?></td>
        </tr>
        <tr>
          <td><?php print '<span>Website</span>' ;?></td>
          <td><?php print l(@$record->website__83,@$record->website__83) ;?></td>
        </tr>
        </table>
        </div>
      <?php } ?>
       
       <?php if (strpos($visibility,'bio') !== false || strpos($visibility,'show-all') !== false) {?>
       <div class="city_state u bio">
 		<table>
          <tr>
            <td><?php print '<span>Biography</span>' ;?></td>
            <td><?php print @$record->biography__80 ;?></td>
          </tr>
        </table>
        </div>      
       <?php } ?>
      
      <?php if (strpos($visibility,'email') !== false || strpos($visibility,'show-all') !== false) {?>
      <div class="email u">
        <table>
        <tr>
           <td><?php print '<span>Email Address</span>';?></td>
           <td><?php print $record->email ;?></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
		   <td>Note: Email addresses are displayed in a non-clickable format as a security measure</td>
         </tr>
         </table>
      </div>
      <?php } ?>
      
      <?php if (strpos($visibility,'phone') !== false || strpos($visibility,'show-all') !== false) {?>
      <div class="contact_number u">
        <table>
        <tr>
          <td><?php print '<span>Phone Number</span>' ;?></td>
           <td><?php print @$record->phone ;?></td>
        </tr>
        </table>
      </div>
     <?php } ?>
      
      <div class="quali u">
        <table>
          <tr>
            <td><?php print '<span>College</span>' ;?></td>
            <td><?php print @$record->college__68 ;?></td>
          </tr>
          <tr>
            <td><?php print '<span>Graduation Year</span>';?></td>
            <td><?php print @$record->college_graduation_year_89 ;?></td>
          </tr>
          <tr>
            <td><?php print '<span>Law School</span>';?></td>
            <td><?php print @$record->law_school__66 ;?></td>
          </tr>
          <tr>
            <td><?php print '<span>Graduation Year</span>' ;?></td>
            <td><?php print @$record->law_school_graduation_year_88 ;?></td>
          </tr>
        </table>
      </div>
     </div>
  </div>
</div>