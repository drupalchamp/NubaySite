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
  //print '<pre>';
  //print_r($record);
  //print '</pre>';
}

?>
<?php 
	   $visibility = $record->hide_selected_fields_147;
?>
            <?php if(strpos($visibility,'picture') === false){ 
             //$user_obj = @user_load($record->contact_id);
	         //$uId = CRM_Core_BAO_UFMatch::getUFId($record->contact_id);
			 if(!empty($record->image_URL)){
	           //print views_embed_view('forum_author_details', 'block_1',$uId);
			   print '<img src="'.$record->image_URL.'" />' ;
	         }else{
	          print '<img src="//wbawbf.org/sites/all/themes/womensbarassociation_new/css/images/WBALogoText.png" />' ;
	         }
            } else {
	        print '<img src="//wbawbf.org/sites/all/themes/womensbarassociation_new/css/images/WBALogoText.png" />' ;	
	       }
		   ?>