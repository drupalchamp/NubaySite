<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,600italic,700,700italic,800,800italic|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<div class="wba">
<div id="non_footer" >
    <div id="whole_wrapper">
        <div id="header_area">
        	<div id="header_top">
                <div id="logo_area">
                    <?php
                        $site_fields = array();
                        if ($site_name) {
                        $site_fields[] = check_plain($site_name);
                        }
                        if ($site_slogan) {
                        $site_fields[] = check_plain($site_slogan);
                        }
                        $site_title = implode(' ', $site_fields);
                        //$site_fields[0] = '<span>'. $site_fields[0] .'</span>';
                        $site_html = implode(' ', $site_fields);			  
                        if ($logo || $site_title) {
                        //print '<a href="'. check_url($base_path) .'" title="'. $site_title .'">';
						print '<a href="?q=content/wba" title="'. $site_title .'">';
                        if ($logo) {
                        print '<img src="'. check_url($logo) .'" alt="'. $site_title .'" id="logo" align="left" />';
                        }
                        print '</a>';
                        }
                    ?>
                </div>
                <div id="header_right"><?php print render($page['header_right']);?></div>
            </div><!----Header top closed-->
            <div id="header_bottom">
            	<div id="menu_area"><?php
                print render($page['menu_area']);
				print render($page['login_menu_area']);
				?></div>
            </div>
        </div><!-------header_area closed-->
        <div id="slide_show_area"><?php print render($page['slide_show_area']);?></div>
        <div id="front_content_area">
        	<div div id="front_content_left"><?php print render($page['front_content_left']);?></div>
            <div div id="front_content_middle"><?php print render($page['front_content_middle']);?></div>
           	<?php if ($page['sidebar_second']): ?>
                <div id="sidebar_second"><?php print render($page['sidebar_second']) ; ?></div>
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
</div><!--- Whole wba-->