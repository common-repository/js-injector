<?php
/**
 * Plugin.class.php
 * 
 * @file ./_core/1.0.0/classes/Plugin.class.php
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
	 * Plugin class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Plugin implements \WP77_Plugin_Interface{
		
		/**
		 * id
		 * 
		 * Plugin ID.
		 * 
		 * @var string String
		 * @since 1.0.0 1.0.0
		 */
		private $id;
		
		
		/**
		 * version
		 * 
		 * Plugin version.
		 * 
		 * @var string String
		 * @since 1.0.0 1.0.0
		 */
		private $version;
		
		
		/**
		 * version_type
		 * 
		 * Plugin version type.
		 * 
		 * @var string String
		 * @since 1.0.0 1.0.0
		 */
		private $version_type;
		
		
		/**
		 * icon
		 * 
		 * ID of fontawesome icon visible in menu and plugin pages.
		 * 
		 * @var string String
		 * @since 1.0.0 1.0.0
		 */
		private $icon;
		
		
		/**
		 * core_version
		 * 
		 * Core version.
		 * 
		 * @var string String
		 * @since 1.0.0 1.0.0
		 */
		private $core_version;
		
		
		/**
		 * license_key
		 * 
		 * Plugin license key.
		 * 
		 * @var string String
		 * @since 1.0.0 1.0.0
		 */
		private $license_key;
		
		
		/**
		 * root_dir
		 * 
		 * Path of plugin root directory.
		 * 
		 * @var string String
		 * @since 1.0.0 1.0.0
		 */
		private $root_dir;
		
		
		/**
		 * root_url
		 * 
		 * URL of plugin root directory.
		 * 
		 * @var string String
		 * @since 1.0.0 1.0.0
		 */
		private $root_url;
		
		
		/**
		 * headers
		 * 
		 * List of plugin data based on main file headers.
		 * 
		 * @var array Array
		 * @since 1.0.0 1.0.0
		 */
		private $headers = array();
		
		
		/**
		 * plugin_tabs
		 * 
		 * List of plugin tabs with associated actions.
		 * 
		 * @var array Array
		 * @since 1.0.0 1.0.0
		 */
		private $plugin_tabs = array();
		
		
		/**
		 * __construct
		 * 
		 * Plugin class constructor.
		 * 
		 * @param string $core_root_dir Path to core root directory.
		 * @return self
		 * @since 1.0.0
		 */
		function __construct($core_root_dir){
			
			$this -> core_version = basename($core_root_dir);
			$this -> root_dir = dirname(dirname($core_root_dir));
			$this -> id = basename($this -> root_dir);
			
			$_core = \WP77::GetLoadedCores($this -> core_version);
			
			
			$this -> headers = \get_file_data($this -> root_dir.'/index.php', array(
				
				'plugin_id'			=>			'Plugin ID', 
				'plugin_name'		=>			'Plugin Name', 
				'plugin_short_name'	=>			'Plugin Short Name', 
				'description'		=>			'Description', 
				'plugin_uri'		=>			'Plugin URI', 
				'version'			=>			'Version', 
				'version_type'		=>			'Version Type', 
				'author'			=>			'Author', 
				'author_uri'		=>			'Author URI', 
				'icon'				=>			'Icon', 
				'upgrade_url'		=>			'Upgrade URL'
			));
			
			
			global $wp_version;
			
			if(version_compare($wp_version, '3.8', '>=')){
				
				$this -> icon = $this -> headers['icon'];
			}
			else{
				
				$this -> icon = $_core -> GetRootURL().'/assets/img/icon_small_default.png';
			}
			
			
			$this -> LoadPluginTabs();
			
			
			$_plugin = $this;
			
			
			register_activation_hook($this -> GetRootDir().'/index.php', array($this, 'ActivationCallback'));
			register_deactivation_hook($this -> GetRootDir().'/index.php', array($this, 'DeactivationCallback'));
			
			
			add_filter('plugin_action_links_'.$_plugin -> GetID().'/index.php', function ($links) use ($_plugin){
				
				if(isset($links['edit'])){
					
					unset($links['edit']);
				}
				
				if(isset($links['deactivate'])){
					
					$links['deactivate'] = preg_replace('/>([^<]+)</', '><span class="fa fa-fw fa-power-off"></span> $1<', $links['deactivate']);
				}
				
				$links[] = '<a href="//77solutions.eu/goto/newsletter?utm_source=wp_admin&utm_medium=plugins_list_newsletter_link&utm_content='.$_plugin -> GetID().'" target="_BLANK"><span class="fa fa-fw fa-send"></span> Newsletter</a>';
				
				$upgrade_url = $_plugin -> GetHeaders('upgrade_url');
				
				if($upgrade_url){
					
					$links[] = '<a href="'.$upgrade_url.'" target="_BLANK"><span class="fa fa-fw fa-star"></span> Upgrade</a>';
				}
				
				return $links;
			});
			
			
			
			
			
			/* Menu BEGIN */
			$menu_mode = 'both_tree';
			
			if(($menu_mode == 'relative') || ($menu_mode == 'both') || ($menu_mode == 'both_tree')){
			// Relative Menu Position
				
				$_plugin = $this;
				
				add_action('admin_menu', function () use ($_core, $_plugin, $menu_mode){
					
					$plugin_data = $_plugin -> GetHeaders();
					
					if(($menu_mode == 'both') || ($menu_mode == 'both_tree')){
						
						$unique_id = $_plugin -> GetID().'-redirect';
						$fn = function () use ($_plugin){
							
							Redirects::Redirect('admin.php?page='.$_plugin -> GetID());
						};
					}
					else{
						
						$unique_id = $_plugin -> GetID();
						$fn = function () use ($_core, $plugin_data, $_plugin){
							
							$plugin_core = \WP77::GetLoadedCores($_plugin -> GetCoreVersion());
							
							include_once($plugin_core -> GetRootDir().'/admin_page.php');
						};
					}
					
					call_user_func_array(array(__NAMESPACE__.'\\MenuPages', 'AddSub'), array(
						
						'parent'		=>			'options-general.php', 
						'title'			=>			$plugin_data['plugin_name'], 
						'text'			=>			$plugin_data['plugin_short_name'], 
						'access'		=>			'administrator', 
						'unique_id'		=>			$unique_id, 
						'fn'			=>			$fn
					));
				});
			}
			
			
			if(($menu_mode == 'separated') || ($menu_mode == 'separated_tree') || ($menu_mode == 'both') || ($menu_mode == 'both_tree')){
			// Separated Menu Position
				
				$_plugin = $this;
				
				add_action('admin_menu', function () use ($_core, $_plugin, $menu_mode){
					
					$plugin_data = $_plugin -> GetHeaders();
					
					$unique_id = $_plugin -> GetID();
					$fn = function () use ($_core, $plugin_data, $_plugin){
						
						$plugin_core = \WP77::GetLoadedCores($_plugin -> GetCoreVersion());
						
						include_once($plugin_core -> GetRootDir().'/admin_page.php');
					};
					
					call_user_func_array(array(__NAMESPACE__.'\\MenuPages', 'Add'), array(
						
						'title'			=>			$plugin_data['plugin_name'], 
						'text'			=>			$plugin_data['plugin_short_name'], 
						'access'		=>			'administrator', 
						'unique_id'		=>			$unique_id, 
						'fn'			=>			$fn, 
						'icon'			=>			$_plugin -> GetIcon()
					));
					
					add_action('admin_head', function (){
						
						echo '<style>.dashicons-before .fa { width: 20px; height: 20px; line-height: 20px; padding: 7px 0px; font-size: 1.2em; font-weight: 400; text-align: center; }</style>';
					});
				});
			}
			
			if(($menu_mode == 'separated_tree') || ($menu_mode == 'both_tree')){
			// Separated Menu Tree
				
				$_plugin = $this;
				
				add_action('admin_menu', function () use ($_core, $_plugin, $menu_mode){
					
					$plugin_data = $_plugin -> GetHeaders();
					
					if(count($_plugin -> GetPluginTabs())){
						
						$tab_index = 0;
						
						foreach($_plugin -> GetPluginTabs() AS $tab_id => $tab_actions){
							
							$tab_title = reset($tab_actions);
							
							if($tab_index == 0){
								
								$unique_id = $_plugin -> GetID();
							}
							else{
								
								$unique_id = $_plugin -> GetID().'&tab='.$tab_id;
							}
							
							$fn = function () use ($_core, $plugin_data, $_plugin){
								
								$plugin_core = \WP77::GetLoadedCores($_plugin -> GetCoreVersion());
								
								include_once($plugin_core -> GetRootDir().'/admin_page.php');
							};
							
							call_user_func_array(array(__NAMESPACE__.'\\MenuPages', 'AddSub'), array(
								
								'parent'		=>			$_plugin -> GetID(), 
								'title'			=>			$plugin_data['plugin_name'], 
								'text'			=>			$tab_title, 
								'access'		=>			'administrator', 
								'unique_id'		=>			$unique_id, 
								'fn'			=>			$fn
							));
							
							$tab_index++;
						}
					}
				});
			}
			
			/////
			global $wp_version;
			
			$_plugin = $this;
			
			if(version_compare($wp_version, '4.4.0', '>=')){
				
				if((isset($_GET['page'])) && ($_GET['page'] == $_plugin -> GetID())){
					
					add_filter('submenu_file', function () use ($_plugin){
						
						$submenu_file = $_plugin -> GetID();
						
						if(isset($_GET['tab'])){
							
							$submenu_file .= '&tab='.$_GET['tab'];
						}
						
						return $submenu_file;
					});
				}
			}
			else{
				
				if((isset($_GET['page'])) && ($_GET['page'] == $_plugin -> GetID())){
					
					add_action('admin_menu', function () use ($_plugin){
						
						global $submenu_file;
						
						$submenu_file = $_plugin -> GetID();
						
						if(isset($_GET['tab'])){
							
							$submenu_file .= '&tab='.$_GET['tab'];
						}
					});
				}
			}
			/////
			/* Menu END */
		}
		
		
		/**
		 * ActivationCallback
		 * 
		 * Execute activate.php file.
		 * 
		 * @param void This method not receive any params.
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/register_activation_hook/
		 * @since 1.0.0
		 */
		public function ActivationCallback(){
			
			$activate_path = $this -> GetRootDir().'/activate.php';
			
			if(file_exists($activate_path)){
				
				$_plugin = $this;
				require_once($activate_path);
			}
		}
		
		
		/**
		 * DeactivationCallback
		 * 
		 * Execute deactivate.php file.
		 * 
		 * @param void This method not receive any params.
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/register_deactivation_hook/
		 * @since 1.0.0
		 */
		public function DeactivationCallback(){
			
			$deactivate_path = $this -> GetRootDir().'/deactivate.php';
			
			if(file_exists($deactivate_path)){
				
				$_plugin = $this;
				require_once($deactivate_path);
			}
		}
		
		
		/**
		 * LoadPluginTabs
		 * 
		 * Prepare list of plugin tabs.
		 * 
		 * @param void This method not receive any params.
		 * @return void This method not returns any value.
		 * @since 1.0.0
		 */
		private function LoadPluginTabs(){
			
			$tabs_list = $this -> FetchPluginTabsList();
			
			if(count($tabs_list)){
				
				foreach($tabs_list AS $tab_id => $tab_actions){
					
					if(count($tab_actions)){
						
						if(isset($tab_actions['index'])){
							
							foreach($tab_actions AS $action_id => $tab_action_file){
								
								$this -> plugin_tabs[$tab_id][$action_id] = ucwords(str_replace('_', ' ', $tab_id));
							}	
						}
						else{
							
							$this -> PutError('<b>Index</b> action of <b>'.$tab_id.'</b> tab was not found but is required.', __FILE__, __LINE__, __CLASS__, __FUNCTION__, __METHOD__);
						}
					}
				}
			}
			else{
				
				$this -> PutError('No tabs found in <b>tabs</b> directory or cant to access.', __FILE__, __LINE__, __CLASS__, __FUNCTION__, __METHOD__);
			}
		}
		
		
		/**
		 * FetchPluginTabsList
		 * 
		 * Fetch list of plugin tabs files from _plugin/tabs/ directory.
		 * 
		 * @param void This method not receive any params.
		 * @return array Returns list of tabs.
		 * @since 1.0.0
		 */
		private function FetchPluginTabsList(){
			
			$r = array();
			
			if($dir_elements = scandir($this -> root_dir.'/_plugin/tabs/')){
				
				foreach($dir_elements AS $dir_element_index => $dir_element_name){
					
					if(($dir_element_name !== '.') && ($dir_element_name !== '..')){
						
						if(preg_match('/^([a-zA-Z_0-9]+)\.([a-zA-Z_0-9]+)\.php$/', $dir_element_name, $dir_element_name_exp)){
							
							$tab_id = $dir_element_name_exp[1];
							$action_id = $dir_element_name_exp[2];
							
							$tab_file = $dir_element_name;
							
							$r[$tab_id][$action_id] = $tab_file;
						}
					}
				}
			}
			
			return $r;
		}
		
		
		/**
		 * OptionAdd
		 * 
		 * Create WordPress option with default value.
		 * 
		 * @param string $option_id ID of WordPress option.
		 * @param string $option_value Default value of WordPress option.
		 * @return boolean Returns true when option was added or false on failure.
		 * @link https://developer.wordpress.org/reference/functions/add_option/
		 * @since 1.0.0
		 */
		public function OptionAdd($option_id, $option_value){
			
			// Introduced: 1.0.0
			return \add_option($this -> id.'-'.$option_id, $option_value);
		}
		
		
		/**
		 * OptionDelete
		 * 
		 * Delete WordPress option.
		 * 
		 * @param string $option_id ID of WordPress option.
		 * @return boolean Returns true when option was deleted or false on failure.
		 * @link https://developer.wordpress.org/reference/functions/delete_option/
		 * @since 1.0.0
		 */
		public function OptionDelete($option_id){
			
			// Introduced: 1.2.0
			return \delete_option($this -> id.'-'.$option_id);
		}
		
		
		/**
		 * OptionGet
		 * 
		 * Get value of WordPress option.
		 * 
		 * @param string $option_id ID of WordPress option.
		 * @return mixed Returns value set for option.
		 * @link https://developer.wordpress.org/reference/functions/get_option/
		 * @since 1.0.0
		 */
		public function OptionGet($option_id){
			
			// Introduced: 1.5.0
			return \get_option($this -> id.'-'.$option_id);
		}
		
		
		/**
		 * OptionUpdate
		 * 
		 * Update value of WordPress option.
		 * 
		 * @param string $option_id ID of WordPress option.
		 * @param string $option_value Default value of WordPress option.
		 * @return boolean Returns true when option was updated or false on failure.
		 * @link https://developer.wordpress.org/reference/functions/update_option/
		 * @since 1.0.0
		 */
		public function OptionUpdate($option_id, $option_value){
			
			// Introduced: 1.0.0
			return \update_option($this -> id.'-'.$option_id, $option_value);
		}
		
		
		/**
		 * GetID
		 * 
		 * Getter of $id property.
		 * 
		 * @param void This method not receive any params.
		 * @return string Returns value of $id property.
		 * @since 1.0.0
		 */
		public function GetID(){
			
			return $this -> id;
			return substr(md5(microtime()), 0, 5);
		}
		
		
		/**
		 * GetVersion
		 * 
		 * Getter of $version property.
		 * 
		 * @param void This method not receive any params.
		 * @return string Returns value of $version property.
		 * @since 1.0.0
		 */
		public function GetVersion(){
			
			return $this -> version;
			return '1.0.0';
		}
		
		
		/**
		 * GetVersionType
		 * 
		 * Getter of $version_type property.
		 * 
		 * @param void This method not receive any params.
		 * @return string Returns value of $version_type property.
		 * @since 1.0.0
		 */
		public function GetVersionType(){
			
			return $this -> version_type;
			return 'free';
		}
		
		
		/**
		 * GetIcon
		 * 
		 * Getter of $icon property.
		 * 
		 * @param void This method not receive any params.
		 * @return string Returns value of $icon property.
		 * @since 1.0.0
		 */
		public function GetIcon(){
			
			return $this -> icon;
		}
		
		
		/**
		 * GetCoreVersion
		 * 
		 * Getter of $core_version property.
		 * 
		 * @param void This method not receive any params.
		 * @return string Returns value of $core_version property.
		 * @since 1.0.0
		 */
		public function GetCoreVersion(){
			
			return $this -> core_version;
			return '1.0.0';
		}
		
		
		/**
		 * GetLicenseKey
		 * 
		 * Getter of $license_key property.
		 * 
		 * @param void This method not receive any params.
		 * @return string Returns value of $license_key property.
		 * @since 1.0.0
		 */
		public function GetLicenseKey(){
			
			return $this -> license_key;
			return '123';
		}
		
		
		/**
		 * GetRootDir
		 * 
		 * Getter of $root_dir property.
		 * 
		 * @param void This method not receive any params.
		 * @return string Returns value of $root_dir property.
		 * @since 1.0.0
		 */
		public function GetRootDir(){
			
			return $this -> root_dir;
		}
		
		
		/**
		 * GetRootURL
		 * 
		 * Getter of $root_url property.
		 * 
		 * @param void This method not receive any params.
		 * @return string Returns value of $root_url property.
		 * @since 1.0.0
		 */
		public function GetRootURL(){
			
			return $this -> root_url;
		}
		
		
		/**
		 * GetHeaders
		 * 
		 * Gets value of $headers property, or array value associated with given key specified in $header_id param.
		 * If $header_id param is set and header with specified ID exists, returns its value.
		 * In case when header with specified ID was not loaded returns false.
		 * 
		 * @param string $header_id ID of header.
		 * @return array|string|false Returns value of $headers property, or $headers[$header_id]/false when $header_id param was specified.
		 * @since 1.0.0
		 */
		public function GetHeaders($header_id=false){
			
			if($header_id){
				
				if(isset($this -> headers[$header_id])){
					
					return $this -> headers[$header_id];
				}
				else{
					
					return false;
				}
			}
			else{
				
				return $this -> headers;
			}
		}
		
		
		/**
		 * GetPluginTabs
		 * 
		 * Getter of $plugin_tabs property.
		 * 
		 * @param void This method not receive any params.
		 * @return string Returns value of $plugin_tabs property.
		 * @since 1.0.0
		 */
		public function GetPluginTabs(){
			
			return $this -> plugin_tabs;
		}
		
	}
	
}
?>