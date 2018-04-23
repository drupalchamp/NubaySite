jQuery( document ).ready(function() {
								  
		jQuery("#block-block-3 #login_box #edit-name").attr("placeholder", "User Name");
		jQuery("#block-block-3 #login_box #edit-pass").attr("placeholder", "Password");					  
								  
								  
		jQuery("#block-block-3").mouseover(function(){
    			jQuery("#block-block-3 #login_box").css("display","block");
 		 });
		jQuery("#block-block-3").mouseout(function(){
    			jQuery("#block-block-3 #login_box").css("display","none");
 		 });
	
		
		
	jQuery('#block-block-34').css("display","none");
	 jQuery('#block-block-33').click(function(){
	   
	   jQuery('#block-block-34').modal();          
	 });
	 
   
   
/**** Board of Directors ****/
   
  jQuery('.view-wba-directors .view-content h3:contains("Board of Directors")').wrap('<div class="board_of_directors_title"></div>');
  jQuery('.view-wba-directors .view-content h3:contains("Emeritus Board")').wrap('<div class="emeritus_board_title"></div>');
  jQuery('.view-wba-directors .view-content h3').each(function() {
     var newDiv = jQuery('<div/>').addClass('president_row');
     jQuery(this).before(newDiv);
     var next = jQuery(this).next();
     newDiv.append(this).append(next);
  });
  jQuery('.view-wba-directors .view-content .board_of_directors_title .president_row, .view-wba-directors .view-content .emeritus_board_title .president_row').removeClass();
  jQuery('.president_row').wrapAll('<div class="all_president_area"></div>');
	
  var divs = jQuery(".view-wba-directors div.views-row");
  for(var i=0; i<divs.length;) {
    i += divs.eq(i).nextUntil(':not(.view-wba-directors .views-row)').andSelf().wrapAll('<div class="all_views_row"></div>').length;
  }
	
  jQuery('.view-wba-directors .view-content .all_president_area .president_row .all_views_row').removeClass();
	
  jQuery('.view-wba-directors .view-content .board_of_directors_title').each(function() {
    var newDiv = jQuery('<div/>').addClass('all_board_of_directors');
    jQuery(this).before(newDiv);
    var next = jQuery(this).next();
    newDiv.append(this).append(next);
  });

  jQuery('.view-wba-directors .view-content .emeritus_board_title').each(function() {
    var newDiv = jQuery('<div/>').addClass('all_emeritus_board');
    jQuery(this).before(newDiv);
    var next = jQuery(this).next();
    newDiv.append(this).append(next);
  });
   
/**** Board of Directors ****/

/**** Board of Trustees ****/

jQuery('.view-board-of-trustees .view-content h3:contains("Emeritus Board")').wrap('<div class="emeritus_board_title"></div>');

var divs = jQuery(".view-board-of-trustees div.views-row");
  for(var i=0; i<divs.length;) {
    i += divs.eq(i).nextUntil(':not(.view-board-of-trustees .views-row)').andSelf().wrapAll('<div class="all_views_row"></div>').length;
  }

jQuery('.view-board-of-trustees .view-content h3').each(function() {
    var newDiv = jQuery('<div/>').addClass('trustees_row');
    jQuery(this).before(newDiv);
    var next = jQuery(this).next();
    newDiv.append(this).append(next);
});

jQuery('.view-board-of-trustees .view-content .emeritus_board_title .trustees_row').removeClass();

jQuery('.view-board-of-trustees .trustees_row').wrapAll('<div class="all_trustees_area"></div>');

jQuery('.view-board-of-trustees .emeritus_board_title').each(function() {
    var newDiv = jQuery('<div/>').addClass('emeritus_board');
    jQuery(this).before(newDiv);
    var next = jQuery(this).next();
    newDiv.append(this).append(next);
});

jQuery('.view-board-of-trustees .view-content .all_trustees_area .trustees_row .all_views_row').removeClass();

/**** Board of Trustees ****/
	

		
});

	 



