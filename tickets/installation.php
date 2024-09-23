<?php
 if (! defined( 'ABSPATH')){
	exit; // Exit if accessed directly
}
global $wpdb;

//Database
if ($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}bizworld_book_ticket'") != $wpdb->prefix . 'bizworld_book_ticket'){
	$wpdb->query("CREATE TABLE {$wpdb->prefix}bizworld_book_ticket (
	ticket_id mediumint(11) NOT NULL AUTO_INCREMENT,
    ticket_name TINYTEXT DEFAULT NULL,
	create_time datetime,
	update_time datetime,
	PRIMARY KEY (ticket_id)
	);");
}

if ($wpdb->get_var("SHOW TABLES LIKE '{$wpdb->prefix}bizworld_customer'") != $wpdb->prefix . 'bizworld_customer'){
	$wpdb->query("CREATE TABLE {$wpdb->prefix}bizworld_customer (
	customer_id mediumint(11) NOT NULL AUTO_INCREMENT,
	ticket_id integer,
	name TEXT DEFAULT NULL,
	email TEXT DEFAULT NULL,
	mobile_phone TEXT DEFAULT NULL,
	designation TEXT DEFAULT NULL,
	companyname TINYTEXT DEFAULT NULL,
	create_time datetime,
	PRIMARY KEY (customer_id)
	);");
}

?>