<?php
/*
Plugin Name: Robax
Plugin URI: http://robax.oblax.ru
Description: Robax - online callback widget
Author: Robax
Author URI: http://oblax.ru
Version: 1.0
*/

if (is_admin())
{
	require_once(dirname(__FILE__).'/plugin_files/RobaxAdmin.class.php');
	RobaxAdmin::get_instance();
}
else
{
	require_once(dirname(__FILE__).'/plugin_files/Robax.class.php');
	Robax::get_instance();
}

