<?php
/**
 * @version $Id$
 * @copyright Center for History and New Media, 2008
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package Mailer
 */

// Define Constants.
define('MAILER_PAGE_PATH', 'request/');
define('MAILER_CONTACT_PAGE_TITLE', 'Registreer');
define('MAILER_CONTACT_PAGE_INSTRUCTIONS', 'Please send us your comments and suggestions.');
define('MAILER_ADD_TO_MAIN_NAVIGATION', 1);

// Add plugin hooks.
add_plugin_hook('install', 'mailer_install');
add_plugin_hook('uninstall', 'mailer_uninstall');
add_plugin_hook('define_routes', 'mailer_define_routes');
add_plugin_hook('config_form', 'mailer_config_form');
add_plugin_hook('config', 'mailer_config');

// Add filters.
add_filter('public_navigation_main', 'mailer_public_navigation_main');


function mailer_install()
{
        $db = get_db();
        $sql = "
       CREATE TABLE IF NOT EXISTS $db->Mailer (
       `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
       `name` VARCHAR(200) NOT NULL ,
       `firstname` VARCHAR(200) NOT NULL ,
       `email` VARCHAR(200) NOT NULL ,
       `telephone` VARCHAR(200) NOT NULL ,
       `institution` VARCHAR(200) NOT NULL ,
       `events_notice` TINYINT NOT NULL ,
       `extra` VARCHAR(500) NOT NULL ,
       INDEX (`id`)) ENGINE = MYISAM";
       $db->query($sql);
    
	set_option('mailer_reply_from_email', get_option('administrator_email'));
	set_option('mailer_forward_to_email', get_option('administrator_email'));
	set_option('mailer_admin_notification_email_subject', MAILER_ADMIN_NOTIFICATION_EMAIL_SUBJECT);
	set_option('mailer_admin_notification_email_message_header', MAILER_ADMIN_NOTIFICATION_EMAIL_MESSAGE_HEADER);
	set_option('mailer_user_notification_email_subject', MAILER_USER_NOTIFICATION_EMAIL_SUBJECT);
	set_option('mailer_user_notification_email_message_header', MAILER_USER_NOTIFICATION_EMAIL_MESSAGE_HEADER);
	set_option('mailer_contact_page_title', MAILER_CONTACT_PAGE_TITLE);
	set_option('mailer_contact_page_instructions', MAILER_CONTACT_PAGE_INSTRUCTIONS);
	set_option('mailer_thankyou_page_title', MAILER_THANKYOU_PAGE_TITLE);
	set_option('mailer_thankyou_page_message', MAILER_THANKYOU_PAGE_MESSAGE);
	set_option('mailer_add_to_main_navigation', MAILER_ADD_TO_MAIN_NAVIGATION);

}

function mailer_uninstall()
{
	delete_option('mailer_reply_from_email');
	delete_option('mailer_forward_to_email');
	delete_option('mailer_admin_notification_email_subject');
	delete_option('mailer_admin_notification_email_message_header');
	delete_option('mailer_user_notification_email_subject');
	delete_option('mailer_user_notification_email_message_header');
	delete_option('mailer_contact_page_title');
	delete_option('mailer_contact_page_instructions');
	delete_option('mailer_thankyou_page_title');
	delete_option('mailer_add_to_main_navigation');
}

/**
 * Adds 2 routes for the form and the thank you page.
 **/
function mailer_define_routes($args)
{
	$router = $args['router'];
	$router->addRoute(
	    'mailer_form',
	    new Zend_Controller_Router_Route(
	        MAILER_PAGE_PATH,
	        array('module'       => 'mailer')
	    )
	);

	$router->addRoute(
	    'mailer_thankyou',
	    new Zend_Controller_Router_Route(
	        MAILER_PAGE_PATH . 'thankyou',
	        array(
	            'module'       => 'mailer',
	            'controller'   => 'index',
	            'action'       => 'thankyou',
	        )
	    )
	);
        
        $router->addRoute(
	    'mailer_books',
	    new Zend_Controller_Router_Route(
	        MAILER_PAGE_PATH . 'books',
	        array(
	            'module'       => 'mailer',
	            'controller'   => 'index',
	            'action'       => 'books',
	        )
	    )
	);
        
        $router->addRoute(
	    'mailer_periodicals',
	    new Zend_Controller_Router_Route(
	        MAILER_PAGE_PATH . 'periodicals',
	        array(
	            'module'       => 'mailer',
	            'controller'   => 'index',
	            'action'       => 'periodicals',
	        )
	    )
	);

}

function mailer_config_form()
{
	include 'config_form.php';
}

function mailer_config()
{
	set_option('mailer_reply_from_email', $_POST['reply_from_email']);
	set_option('mailer_forward_to_email', $_POST['forward_to_email']);
	set_option('mailer_add_to_main_navigation', $_POST['add_to_main_navigation']);
}

function mailer_public_navigation_main($nav)
{
	$contact_title = get_option('mailer_contact_page_title');
	$contact_add_to_navigation = get_option('mailer_add_to_main_navigation');
	if ($contact_add_to_navigation) {
	    //$nav[$contact_title] = url(array(), 'mailer_form');
	    $navLinks[] = array(
	    		'label' => $contact_title,
	    		'uri' => url(array(), 'mailer_form')
	    );
	    $nav = array_merge($nav, $navLinks);
	}
    return $nav;

}