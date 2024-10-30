<?php
/**
 * MenuPages.class.php
 * 
 * @file ./_core/1.0.0/classes/MenuPages.class.php
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


namespace WP77\V1_0_0L{
	
	
	if(!defined('ABSPATH')){ exit; }
	
	
	/**
	 * MenuPages class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class MenuPages{
		
		/**
		 * Add
		 * 
		 * Add a top-level menu page.
		 * 
		 * @param string $page_title The text to be displayed in the title tags of the page when the menu is selected.
		 * @param string $menu_title The text to be used for the menu.
		 * @param string $capability The capability required for this menu to be displayed to the user.
		 * @param string $menu_slug The slug name to refer to this menu by (should be unique for this menu).
		 * @param callable $function The function to be called to output the content for this page.
		 * @param string $icon_url The URL to the icon to be used for this menu. Pass a base64-encoded SVG using a data URI, which will be colored to match the color scheme. This should begin with 'data:image/svg+xml;base64,'. Pass the name of a Dashicons helper class to use a font icon, e.g. 'dashicons-chart-pie'. Pass 'none' to leave div.wp-menu-image empty so an icon can be added via CSS.
		 * @param int $position The position in the menu order this one should appear.
		 * @return string The resulting page's hook_suffix.
		 * @link https://developer.wordpress.org/reference/functions/add_menu_page/
		 * @since 1.0.0
		 */
		public static function Add($page_title, $menu_title, $capability, $menu_slug, $function='', $icon_url='', $position=null){
			
			global $_core;
			
			$default_icon = $_core -> GetRootURL().'/assets/img/icon_small_default.png';
			
			// Introduced: ???
			$r = \add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $default_icon, $position);
			
			global $wp_version;
			
			if(version_compare($wp_version, '3.8', '>=')){
				
				global $menu;
				
				if(count($menu)){
					
					foreach($menu AS $index => $data){
						
						if((isset($data[5])) && ($data[5] == $r)){
							
							$menu[$index][6] = '" alt><span class="fa fa-fw fa-'.$icon_url.'"></span><img src="';
							break;
						}
					}
				}
			}
			
			return $r;
		}
		
		
		/**
		 * Remove
		 * 
		 * Remove a top-level admin menu.
		 * 
		 * @param string $menu_slug The slug of the menu.
		 * @return array|boolean Returns removed menu on success, false if not found.
		 * @link https://developer.wordpress.org/reference/functions/remove_menu_page/
		 * @since 1.0.0
		 */
		public static function Remove($menu_slug){
			
			// Introduced: 3.1.0
			return \remove_menu_page($menu_slug);
		}
		
		
		/**
		 * AddSub
		 * 
		 * Add a submenu page.
		 * 
		 * @param string $parent_slug The slug name for the parent menu (or the file name of a standard WordPress admin page).
		 * @param string $page_title The text to be displayed in the title tags of the page when the menu is selected.
		 * @param string $menu_title The text to be used for the menu.
		 * @param string $capability The capability required for this menu to be displayed to the user.
		 * @param string $menu_slug The slug name to refer to this menu by (should be unique for this menu).
		 * @param callable $function The function to be called to output the content for this page.
		 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
		 * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
		 * @since 1.0.0
		 */
		public static function AddSub($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function=''){
			
			// Introduced: ???
			return \add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
		}
		
		
		/**
		 * RemoveSub
		 * 
		 * Remove an admin submenu.
		 * 
		 * @param string $menu_slug The slug for the parent menu.
		 * @param string $submenu_slug The slug of the submenu.
		 * @return array|boolean Returns removed submenu on success, false if not found.
		 * @link https://developer.wordpress.org/reference/functions/remove_submenu_page/
		 * @since 1.0.0
		 */
		public static function RemoveSub($menu_slug, $submenu_slug){
			
			// Introduced: 3.1.0
			return \remove_submenu_page($menu_slug, $submenu_slug);
		}
		
	}
	
}
?>