<?php
add_plugin_hook('define_routes', 'apc_define_routes');

function apc_define_routes($args){
        $router = $args['router'];
	$router->addRoute(
	    'apc_index',
	    new Zend_Controller_Router_Route(
	        '/apc',
	        array('module' => 'apc')
	    )
	);
        	
}