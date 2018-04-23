<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,600italic,700,700italic,800,800italic|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<div class="wbf">
<div id="non_footer" >
    <div id="whole_wrapper">
        <div id="header_area">
        	<div id="header_top">
                <div id="logo_area">
                     <?php print render($page['wbf_logo_area']);?>
                </div>
                <div id="header_right"><?php print render($page['header_right_wbf']);?></div>
            </div><!----Header top closed-->
            <div id="header_bottom">
            	<div id="menu_area"><?php
                print render($page['menu_area_wbf']);
				print render($page['login_menu_area']);
				?></div>
            </div>
        </div><!-------header_area closed-->
        <div id="slide_show_area"><?php print render($page['slide_show_area']);?></div>
        <div id="front_content_area">
        	<div  id="front_content_left"><?php print render($page['front_content_left']);?></div>
            <div  id="front_content_middle"><?php print render($page['front_content_middle']);?></div>
           	<?php if ($page['sidebar_second_wbf']): ?>
                <div id="sidebar_second">
					<?php print render($page['sidebar_second_wbf']);?>
                    </div>
           <?php endif; ?>
        </div><!----front content closed-->
        
    </div><!---whole_wrapper closed--->
</div><!----non_footer closed-->
<div id="whole_footer_area">
	<div id="footer_area">
    	<div id="footer_left_area"><?php print render($page['footer_left_area']);?></div>
        <div id="footer_right_area"><?php print render($page['footer_right_area']);?></div>
    </div>
</div><!--whole_footer_area closed-->
</div>