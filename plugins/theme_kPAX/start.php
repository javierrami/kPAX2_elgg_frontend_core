<?php

    elgg_register_event_handler('init', 'system', 'theme_kPAX_init');

    function theme_kPAX_init() {
        
        global $CONFIG;

        elgg_unregister_menu_item('topbar', 'elgg_logo');

 // 		elgg_extend_view('css/elgg', 'theme_kPAX/css');

	    $pageHandler = 'theme_kPAX';
		elgg_register_page_handler($pageHandler,'theme_kPAX_page_handler');

    }

    function theme_kPAX_page_handler($page){
		global $CONFIG;
		$plugin_name = 'theme_kPAX';
		$pageHandler = 'theme_kPAX';
		
//		switch ($page[0]){}

		return true;

	}
?> 