<?php
/**
 * index.php
 * 
 * @file ./_plugin/index.php
 * @package 77solutions.JSInjector
 * @author 77 Solutions, Matthew Lukas Mania
 * @license GPLv3
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 */
/*
This file is part of Custom JS Injector.

Custom JS Injector is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or any later version.

Custom JS Injector is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Custom JS Injector. If not, see https://www.gnu.org/licenses/gpl-3.0.txt.
*/


if(!defined('ABSPATH')){ exit; }


$_core -> Call('Actions', 'Add', array('plugins_loaded', function () use ($_plugin, $_core){
	
	$current_section_id = WP77::CurrentSection();
	
	$sections_prefixes = array(
		
		'admin/panel'		=>		'dashboard', 
		'admin/login'		=>		'login', 
		'admin/recovery'	=>		'recovery', 
		'admin/register'	=>		'register', 
		'site'				=>		'site'
	);
	
	if(isset($sections_prefixes[$current_section_id])){
		
		$section_prefix = $sections_prefixes[$current_section_id];
		
		$head_enabled = $_plugin -> OptionGet($section_prefix.'_js_head_enabled');
		$foot_enabled = $_plugin -> OptionGet($section_prefix.'_js_foot_enabled');
		
		if(($head_enabled) || ($foot_enabled)){
			
			if($head_enabled){
				
				$head_code_safe = $_plugin -> OptionGet($section_prefix.'_js_head_code_safe');
				
				if($section_prefix == 'dashboard'){
					
					$hook_id = 'admin_head';
				}
				else if($section_prefix == 'login'){
					
					$hook_id = 'login_head';
				}
				else if($section_prefix == 'recovery'){
					
					$hook_id = 'login_head';
				}
				else if($section_prefix == 'register'){
					
					$hook_id = 'login_head';
				}
				else if($section_prefix == 'site'){
					
					$hook_id = 'wp_head';
				}
				// echo $hook_id;exit;
				
				$_core -> Call('Actions', 'Add', array($hook_id, function () use ($_core, $head_code_safe, $section_prefix){
					
					echo "\r\n".'<!-- Custom JS Injector - Head ('.ucfirst($section_prefix).') BEGIN -->'."\r\n";
					echo '<script>';
					echo "\r\n".stripslashes($head_code_safe)."\r\n";
					echo '</script>';
					echo "\r\n".'<!-- Custom JS Injector - Head ('.ucfirst($section_prefix).') END -->'."\r\n";
				}));
			}
			
			if($foot_enabled){
				
				$foot_code_safe = $_plugin -> OptionGet($section_prefix.'_js_foot_code_safe');
				
				if($section_prefix == 'dashboard'){
					
					$hook_id = 'admin_footer';
				}
				else if($section_prefix == 'login'){
					
					$hook_id = 'login_footer';
				}
				else if($section_prefix == 'recovery'){
					
					$hook_id = 'login_footer';
				}
				else if($section_prefix == 'register'){
					
					$hook_id = 'login_footer';
				}
				else if($section_prefix == 'site'){
					
					$hook_id = 'wp_footer';
				}
				
				$_core -> Call('Actions', 'Add', array($hook_id, function () use ($_core, $foot_code_safe, $section_prefix){
					
					echo "\r\n".'<!-- Custom JS Injector - Foot ('.ucfirst($section_prefix).') BEGIN -->'."\r\n";
					echo '<script>';
					echo "\r\n".stripslashes($foot_code_safe)."\r\n";
					echo '</script>';
					echo "\r\n".'<!-- Custom JS Injector - Foot ('.ucfirst($section_prefix).') END -->'."\r\n";
				}));
			}
		}
	}
}));
?>