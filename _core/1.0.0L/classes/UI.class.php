<?php
/**
 * UI.class.php
 * 
 * @file ./_core/1.0.0/classes/UI.class.php
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
	 * UI class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class UI{
		
		/**
		 * PluginTabs
		 * 
		 * Display or get HTML code of admin page "plugin tabs".
		 * 
		 * @param Plugin $_plugin Plugin object.
		 * @param array $plugin_tabs Plugin tabs list.
		 * @param string $active_tab_id ID of active plugin tab.
		 * @param boolean $return If set to true, then returns output, when false then displays output.
		 * @return void|string Returns HTML code when $return param was set to true, displays HTML code otherwise.
		 * @since 1.0.0
		 */
		public static function PluginTabs($_plugin, $plugin_tabs, $active_tab_id, $return=false){
			
			$plugin_tabs_icons = array('overview'=>'globe', 'expiration_rules'=>'code', 'activate'=>'link', 'export_import' => 'upload');
			$plugin_tabs_icons = array();
			
			$plugin_tabs_keys = array_keys($plugin_tabs);
			$first_tab_id = reset($plugin_tabs_keys);
			
			$r = '';
			
			global $wp_version;
			
			if(version_compare($wp_version, '3.8', '<')){
				
				$r .= '<style>h2 .nav-tab { font-size: 15px; padding: 0px 10px; font-weightx: bold; }</style>';
			}
			
			foreach($plugin_tabs AS $tab_id => $tab_actions){
				
				// if(!in_array($tab_id, array('export_import', 'upgrade', 'activate'))){
					
					$tab_url = '?page='.$_GET['page'];
					
					if($tab_id !== $first_tab_id){
						
						$tab_url .= '&tab='.$tab_id;
					}
					
					$tab_text = reset($tab_actions);
					
					$r .= '<a href="'.$tab_url.'" class="nav-tab';
					
					if($active_tab_id == $tab_id){
						
						$r .= ' nav-tab-active';
					}
					$r .= '">';
					
					if(isset($plugin_tabs_icons[$tab_id])){
						
						$r .= '<span class="fa fa-fw fa-'.$plugin_tabs_icons[$tab_id].'"></span>&nbsp; ';
					}
					
					$r .= $tab_text.'</a>';
				// }
			}
			
			$upgrade_url = $_plugin -> GetHeaders('upgrade_url');
			
			if($upgrade_url){
				
				$r .= '<div class="float-right xs-hidden">';
				
				$r .= '<a href="'.$upgrade_url.'" target="_BLANK" title="Upgrade" class="nav-tab';
				
				if($active_tab_id == 'upgrade'){
					
					$r .= ' nav-tab-active';
				}
				
				$r .= ' nav-tab-right"><span class="fa fa-fw fa-level-up"></span>&nbsp;</a>';
				
				$r .= '</div>';
			}
			
			$r = '<h2 class="nav-tab-wrapper wp-clearfix">'.$r.'</h2>';
			
			if($return){
				
				return $r;
			}
			else{
				
				echo $r;
			}
		}
		
		
		/**
		 * PluginPageH1
		 * 
		 * Display or get HTML code of admin page H1.
		 * 
		 * @param Plugin $_plugin Plugin object.
		 * @param array $plugin_data Plugin data.
		 * @param boolean $return If set to true, then returns output, when false then displays output.
		 * @return void|string Returns HTML code when $return param was set to true, displays HTML code otherwise.
		 * @since 1.0.0
		 */
		public static function PluginPageH1($_plugin, $plugin_data, $return=false){
			
			global $wp_version;
			
			$r = '';
			
			if(version_compare($wp_version, '3.8', '>=')){
				
				$r .= '<h1><span class="fa fa-fw fa-'.$_plugin -> GetIcon().'"></span>&nbsp; '.$plugin_data['plugin_name'].'</h1>';
			}
			else{
				
				$_core = \WP77::GetLoadedCores($_plugin -> GetCoreVersion());
				
				$r .= '<div class="icon32"><img src="'.$_core -> GetRootURL().'/assets/img/icon_medium_default.png"></div>';
				$r .= '<h2>'.$plugin_data['plugin_name'].'</h2>';
			}
			
			if($return){
				
				return $r;
			}
			else{
				
				echo $r;
			}
		}
		
		
		/**
		 * PluginPageH2
		 * 
		 * Display or get HTML code of admin page H2.
		 * 
		 * @param string $text Text to display.
		 * @param string $icon ID of icon.
		 * @param boolean $return If set to true, then returns output, when false then displays output.
		 * @return void|string Returns HTML code when $return param was set to true, displays HTML code otherwise.
		 * @since 1.0.0
		 */
		public static function PluginPageH2($text, $icon=false, $return=false){
			
			$r = '<br><div class="xs-hidden"><h3><span class="fa fa-fw fa-'.$icon.'"></span>&nbsp; '.$text.'</h3><br></div>';
			
			if($return){
				
				return $r;
			}
			else{
				
				echo $r;
			}
		}
		
		
		/**
		 * PluginFormButtons
		 * 
		 * Display or get HTML code of admin page form buttons.
		 * 
		 * @param array $buttons_list List of buttons to display, in format text => target_url|"submit".
		 * @param boolean $return If set to true, then returns output, when false then displays output.
		 * @return void|string Returns HTML code when $return param was set to true, displays HTML code otherwise.
		 * @since 1.0.0
		 */
		public static function PluginFormButtons($buttons_list, $return=false){
			
			$r = '';
			
			$r .= '<p class="submit">';
			
			if(is_array($buttons_list)){
				
				if(count($buttons_list)){
					
					$buttons_collection = array();
					
					foreach($buttons_list AS $button_text => $button_target){
						
						if($button_target == 'submit'){
							
							$buttons_collection[] = '<input type="submit" name="submit" id="control_submit" class="button button-primary" value="'.$button_text.'">';
						}
						else{
							
							$buttons_collection[] = '<a href="'.$button_target.'" class="button button-secondary">'.$button_text.'</a>';
						}
					}
					
					$r .= implode(' &nbsp;&nbsp;&nbsp; ', $buttons_collection);
				}
			}
			
			$r .= '</p>';
			
			if($return){
				
				return $r;
			}
			else{
				
				echo $r;
			}
		}
		
		
		/* Notices BEGIN */
			
			/**
			 * NoticeSuccess
			 * 
			 * Display or get HTML code of "success" notice.
			 * 
			 * @param string $msg Message content.
			 * @param boolean $return If set to true, then returns output, when false then displays output.
			 * @return void|string Returns HTML code when $return param was set to true, displays HTML code otherwise.
			 * @since 1.0.0
			 */
			public static function NoticeSuccess($msg, $return=false){
				
				return self::Notice('success', $msg, $return);
			}
			
			
			/**
			 * NoticeUpdated
			 * 
			 * Display or get HTML code of "updated" notice.
			 * 
			 * @param string $msg Message content.
			 * @param boolean $return If set to true, then returns output, when false then displays output.
			 * @return void|string Returns HTML code when $return param was set to true, displays HTML code otherwise.
			 * @since 1.0.0
			 */
			public static function NoticeUpdated($msg, $return=false){
				
				return self::NoticeSuccess($msg, $return);
			}
			
			
			/**
			 * NoticeInfo
			 * 
			 * Display or get HTML code of "info" notice.
			 * 
			 * @param string $msg Message content.
			 * @param boolean $return If set to true, then returns output, when false then displays output.
			 * @return void|string Returns HTML code when $return param was set to true, displays HTML code otherwise.
			 * @since 1.0.0
			 */
			public static function NoticeInfo($msg, $return=false){
				
				return self::Notice('info', $msg, $return);
			}
			
			
			/**
			 * NoticeWarning
			 * 
			 * Display or get HTML code of "warning" notice.
			 * 
			 * @param string $msg Message content.
			 * @param boolean $return If set to true, then returns output, when false then displays output.
			 * @return void|string Returns HTML code when $return param was set to true, displays HTML code otherwise.
			 * @since 1.0.0
			 */
			public static function NoticeWarning($msg, $return=false){
				
				return self::Notice('warning', $msg, $return);
			}
			
			
			/**
			 * NoticeError
			 * 
			 * Display or get HTML code of "error" notice.
			 * 
			 * @param string $msg Message content.
			 * @param boolean $return If set to true, then returns output, when false then displays output.
			 * @return void|string Returns HTML code when $return param was set to true, displays HTML code otherwise.
			 * @since 1.0.0
			 */
			public static function NoticeError($msg, $return=false){
				
				return self::Notice('error', $msg, $return);
			}
			
			
			/**
			 * NoticeDefault
			 * 
			 * Display or get HTML code of "default" notice.
			 * 
			 * @param string $msg Message content.
			 * @param boolean $return If set to true, then returns output, when false then displays output.
			 * @return void|string Returns HTML code when $return param was set to true, displays HTML code otherwise.
			 * @since 1.0.0
			 */
			public static function NoticeDefault($msg, $return=false){
				
				return self::Notice('default', $msg, $return);
			}
			
			
			/**
			 * Notice
			 * 
			 * Display or get HTML code of notice.
			 * 
			 * @param string $type Type of notice. Accepted types: success, updated, info, warning, error, default.
			 * @param string $msg Message content.
			 * @param boolean $return If set to true, then returns output, when false then displays output.
			 * @return void|string Returns HTML code when $return param was set to true, displays HTML code otherwise.
			 * @since 1.0.0
			 */
			public function Notice($type='default', $msg, $return=false){
				
				global $wp_version;
				
				$r = '';
				
				if(version_compare($wp_version, '3.8', '<')){
					
					$r .= '<br>';
				}
				
				
				if(version_compare($wp_version, '3.8', '<')){
					
					if(in_array($type, array('info', 'warning', 'success', 'default'))){
						
						$notice_class = 'notice updated '.$type;
					}
					else{
						
						$notice_class = 'notice '.$type;
					}
				}
				else{
					
					$notice_class = 'notice notice-'.$type.' is-dismissible';
				}
				
				$r .= '<div class="'.$notice_class.'">';
				$r .= '<p><strong>'.$msg.'</strong></p>';
				
				if(version_compare($wp_version, '3.8', '>=')){
					
					$r .= '<button type="button" class="notice-dismiss"></button>';
				}
				
				$r .= '</div>';
				
				if($return){
					
					return $r;
				}
				else{
					
					echo $r;
				}
			}
			
		/* Notices END */
		
	}
	
}
?>