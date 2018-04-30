<?php
/*
  Plugin Name: my custom product
  Description: you can create custom product.
  Version: 1.0
  Author: Akhilesh
  Author URI: https://www.akhi.com/
  License: GPLv2
 */


class MyProduct_custom 
{
	function __construct()
	{
	   add_action('init', array($this,'custom_productcc'));	
	}
   function register()
	{
		add_action('admin_enqueue_scripts',array($this,'enqueue'));
	} 
	
	function pactivate(){
		$this->custom_productcc();
		flush_rewrite_rules();
	}
	function pdeactivate(){
		flush_rewrite_rules();
	}
	function puninstall(){
		echo"";
	}

	
	function custom_productcc(){
		register_post_type( 'product',['public' => true,'label'=>'Products'] ); 
		
			}
	
	 
 function enqueue(){
		
		wp_enqueue_style('mymainstyle',plugis_url('/assets/mystyle.css',__FILE__));
		wp_enqueue_script('mymainscript',plugis_url('/assets/myscript.js',__FILE__));
		} 
	
	
	
}

if(class_exists('MyProduct_custom')){
		
		$mypobj = new MyProduct_custom();	
		// $mypobj->register();
		
		
		}
		//activation
		register_activation_hook( __FILE__, array($mypobj,'pactivate'));
		
		//deactivation
		
		register_deactivation_hook( __FILE__, array($mypobj,'pdeactivate'));
		
		//Uninstall
		register_uninstall_hook( __FILE__, array($mypobj,'puninstall'));  
		 