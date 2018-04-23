
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
	 
	jQuery('.membership table tr td:nth-child(1)').addClass('col1');
	jQuery('.membership table tr td:nth-child(2)').addClass('col2');
	jQuery('.membership table tr td:nth-child(3)').addClass('col3');
  
  
   
   
/**** Board of Directors ****/
 /*  
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
   
   */
/**** Board of Directors ****/

/**** Board of Trustees ****/
/*
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
*/

/**** Board of Trustees ****/
	
jQuery( "#block-menu-menu-wba-main-menu .block-title" ).click(function() {
  jQuery( "#block-menu-menu-wba-main-menu ul.menu" ).slideToggle( "slow" );
  jQuery(this).toggleClass( "active" );
});
jQuery( "#block-menu-menu-wbf-main-menu .block-title" ).click(function() {
  jQuery( "#block-menu-menu-wbf-main-menu ul.menu" ).slideToggle( "slow" );
  jQuery(this).toggleClass( "active" );
});
	jQuery("#block-menu-menu-wba-main-menu ul.menu li.dhtml-menu-cloned-leaf a").click(function() {
      var link = jQuery(this).attr('href');
      window.open(link,'_self');
    });
	
    jQuery("#block-menu-menu-wbf-main-menu ul.menu li.dhtml-menu-cloned-leaf a").click(function() {
      var link = jQuery(this).attr('href');
      window.open(link,'_self');
    });
	
	
	
	
	jQuery('#block-views-premium-directory-block-1 .item-list .views-row .views-field').each(function () {
		jQuery(this).find('span.field-content').each(function () {
			if (jQuery(this).text().trim() == "") {
				jQuery(this).closest("#block-views-premium-directory-block-1 .item-list .views-row .views-field").remove();
			};
		});
	});
	
	//jQuery('#block-views-premium-directory-block-1 .view-content .item-list h3').prependTo('#attorney_detail .full_detail .attorney_image');
		jQuery('#block-views-premium-directory-block-1 .view-content .item-list h3').prependTo('.view-attorney-profile .view-content');
	
	
	
	
	
});


	 



