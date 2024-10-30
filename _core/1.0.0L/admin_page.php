<?php
/**
 * admin_page.php
 * 
 * @file ./_core/1.0.0/admin_page.php
 * @package 77solutions.WP77L
 * @author 77 Solutions, Matthew Lukas Mania
 * @license GPLv3
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 */
/*
This file is part of WP77 Lite.

WP77 Lite is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

WP77 Lite is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with WP77 Lite.  If not, see https://www.gnu.org/licenses/gpl-3.0.txt.
*/


if(!defined('ABSPATH')){ exit; }
?>
<div class="wrap wrap-77">
	
	<?php $_core -> Call('UI', 'PluginPageH1', array($_plugin, $plugin_data)); ?>
	
	<?php
	$plugin_tabs = $_plugin -> GetPluginTabs();
	asort($plugin_tabs);
	
	$plugin_tabs_keys = array_keys($plugin_tabs);
	$first_tab_id = reset($plugin_tabs_keys);
	
	if(isset($_GET['tab'])){
		
		if(isset($plugin_tabs[$_GET['tab']])){
			
			$active_tab_id = $_GET['tab'];
		}
		else{
			
			$_core -> Call('Redirects', 'Redirect', array('?page='.$_GET['page']));
			exit;
		}
	}
	else{
		
		$active_tab_id = $first_tab_id;
	}
	
	if(isset($_GET['action'])){
		
		if(isset($plugin_tabs[$active_tab_id][$_GET['action']])){
			
			$active_action_id = $_GET['action'];
		}
		else{
			
			$_core -> Call('Redirects', 'Redirect', array('?page='.$_GET['page'].'&tab='.$active_tab_id));
			exit;
		}
	}
	else{
		
		$active_action_id = 'index';
	}
	?>
	
	
	<?php
	if(isset($_COOKIE['redirect_notice'])){
		
		echo stripslashes($_COOKIE['redirect_notice']);
		setcookie('redirect_notice', false, (time()-1));
	}
	?>
	
	<?php $_core -> Call('UI', 'PluginTabs', array($_plugin, $plugin_tabs, $active_tab_id)); ?>
	
	
	<?php include($_plugin -> GetRootDir().'/_plugin/tabs/'.$active_tab_id.'.'.$active_action_id.'.php'); ?>
</div>