<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,600italic,700,700italic,800,800italic|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>

<?php
if( is_numeric(arg(1)) && !empty($node->field_select_layout['und'])){
	if($node->field_select_layout['und']['0']['value'] == "wbf"){
		$themename = "wbf";
	}else{
		$themename = "wba";
	}
}else{
	$themename = "wba";
    }

if(arg(0)=="member-firms" || arg(0)=="board-of-trustees"){
$themename = "wbf";
}
if(arg(0)=="forum"){
   	$val= arg(1);
	$value= "";
	$values = taxonomy_get_parents($val);
	//$term = taxonomy_term_load($value);
	foreach($values as $value){ 
	}
	if($value->tid=="7" || $val=="7"){
		$themename = "wbf";
	}
	else{
		$themename = "wba";
	}
}


?>
<div class="<?php print $themename ; ?>">

<div id="non_footer">
    <div id="whole_wrapper">
        <div id="header_area">
        	<div id="header_top">
                <div id="logo_area">
                
                    <?php
					  if($themename == "wbf"){
		                 print render($page['wbf_logo_area']);
	                  }else{
		               print '<a href="?q=content/wba" title="'. $site_title .'">
						<img src="'. check_url($logo) .'" alt="'. $site_title .'" id="logo" align="left" /></a>';
	                 }
                  				
                    ?>
                </div>
                <div id="header_right">				
				<?php
                 if($themename == "wbf"){
		            print render($page['header_right_wbf']);
	              }else{
		            print render($page['header_right']);
	              }
               
				?>
                </div>
            </div><!----Header top closed-->
            <div id="header_bottom">
            	<div id="menu_area"><?php
                 if($themename == "wbf"){
		            print render($page['menu_area_wbf']);
	              }else{
		            print render($page['menu_area']);
	              }
                
				print render($page['login_menu_area']);?>
                </div>
            </div>
        </div><!-------header_area closed-->
        <div id="whole_main_div">
        
         	<?php if ($page['sidebar_first']): ?>
                <div id="sidebar_first"><?php print render($page['sidebar_first']) ; ?></div>
            <?php endif; ?>
            <div id="midcontent">
              <?php print render($page['content_top']);?>
              <?php print render($page['upper_content']);?>
              <?php if(!empty($title)){ print "<div><h1 class='main_title'>".$title."</h1></div>" ; }?>
              <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
              <?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
              <?php print render($tabs2); ?>  
              <?php if ($show_messages && $messages): print $messages; endif; ?>
              <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
              <?php print render($page['content']);?>
              <?php print render($page['content_bottom']);?>
           </div><!----midcontent closed-->
           
              <?php if ($page['mid_right']): ?>
                <div id="mid_right"><?php print render($page['mid_right']) ; ?></div>
              <?php endif; ?>
           
           <?php if ($page['sidebar_second'] || $page['sidebar_second_wbf'] ): ?>
                <div id="sidebar_second">
				   <?php 
				     if($themename == "wbf"){
					 	print render($page['sidebar_second_wbf']) ;
					     
					 }
					 else{
					      print render($page['sidebar_second']) ; 
					} 
			      ?>
               </div>
            <?php endif; ?>
            
       </div><!----whole_main_div closed-->
    </div><!---whole_wrapper closed--->
</div><!----non_footer closed-->
<div id="whole_footer_area">
	<div id="footer_area">
    	<div id="footer_left_area"><?php print render($page['footer_left_area']);?></div>
        <div id="footer_right_area"><?php print render($page['footer_right_area']);?></div>
    </div>
</div><!--whole_footer_area closed-->
</div>