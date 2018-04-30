<?php 
/**
* Trigger this file on plugin Unistall
*
* @package MyProduct_custom 
*/
if(! defined(WP_UNINSTALL_PLUGIN) ){
	die;
	}
// Clear Database Stored Data
$producs = get_posts(array('post_type','product','numberposts'=>-1));

foreach($producs as $product)
{
	wp_delete_post($product->ID,true);
}