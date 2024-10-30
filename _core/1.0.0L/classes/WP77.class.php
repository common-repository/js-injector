<?php
/**
 * WP77.class.php
 * 
 * @file ./_core/1.0.0/classes/WP77.class.php
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


/**
 * Debug constant.
 * 
 * @const WP77_DEBUG When set to true, debug errors are shown, when set to false then not.
 */
define('WP77_DEBUG', true);


/**
 * Core interface.
 * 
 * @package 77solutions.WP77L
 * @since 1.0.0
 */
interface WP77_Core_Interface{
	
	/**
	 * InitPlugin
	 * 
	 * Initializes plugin.
	 * 
	 * @param string $core_root_dir Path to core root directory.
	 * @return object Returns created instance of Plugin class.
	 * @since 1.0.0
	 */
	public function InitPlugin($core_root_dir);
	
	
	/**
	 * GetVersion
	 * 
	 * Getter of $version property.
	 * 
	 * @param void This method not receive any params.
	 * @return string Returns value of $version property.
	 * @since 1.0.0
	 */
	public function GetVersion();
	
	
	/**
	 * GetInitiatorID
	 * 
	 * Getter of $initiator_id property.
	 * 
	 * @param void This method not receive any params.
	 * @return string Returns value of $initiator_id property.
	 * @since 1.0.0
	 */
	public function GetInitiatorID();
	
	
	/**
	 * GetRootDir
	 * 
	 * Getter of $root_dir property.
	 * 
	 * @param void This method not receive any params.
	 * @return string Returns value of $root_dir property.
	 * @since 1.0.0
	 */
	public function GetRootDir();
	
	
	/**
	 * GetRootURL
	 * 
	 * Getter of $root_url property.
	 * 
	 * @param void This method not receive any params.
	 * @return string Returns value of $root_url property.
	 * @since 1.0.0
	 */
	public function GetRootURL();
	
}


/**
 * Plugin interface.
 * 
 * @package 77solutions.WP77L
 * @since 1.0.0
 */
interface WP77_Plugin_Interface{
	
	/**
	 * GetID
	 * 
	 * Getter of $id property.
	 * 
	 * @param void This method not receive any params.
	 * @return string Returns value of $id property.
	 * @since 1.0.0
	 */
	public function GetID();
	
	
	/**
	 * GetVersion
	 * 
	 * Getter of $version property.
	 * 
	 * @param void This method not receive any params.
	 * @return string Returns value of $version property.
	 * @since 1.0.0
	 */
	public function GetVersion();
	
	
	/**
	 * GetVersionType
	 * 
	 * Getter of $version_type property.
	 * 
	 * @param void This method not receive any params.
	 * @return string Returns value of $version_type property.
	 * @since 1.0.0
	 */
	public function GetVersionType();
	
	
	/**
	 * GetCoreVersion
	 * 
	 * Getter of $core_version property.
	 * 
	 * @param void This method not receive any params.
	 * @return string Returns value of $core_version property.
	 * @since 1.0.0
	 */
	public function GetCoreVersion();
	
	
	/**
	 * GetLicenseKey
	 * 
	 * Getter of $license_key property.
	 * 
	 * @param void This method not receive any params.
	 * @return string Returns value of $license_key property.
	 * @since 1.0.0
	 */
	public function GetLicenseKey();
	
	
	/**
	 * GetRootDir
	 * 
	 * Getter of $root_dir property.
	 * 
	 * @param void This method not receive any params.
	 * @return string Returns value of $root_dir property.
	 * @since 1.0.0
	 */
	public function GetRootDir();
	
	
	/**
	 * GetRootURL
	 * 
	 * Getter of $root_url property.
	 * 
	 * @param void This method not receive any params.
	 * @return string Returns value of $root_url property.
	 * @since 1.0.0
	 */
	public function GetRootURL();
	
}


/**
 * Cores manager class (final).
 * 
 * @package 77solutions.WP77L
 * @since 1.0.0
 */
final class WP77{
	
	/**
	 * loaded_cores
	 * 
	 * List of loaded cores.
	 * 
	 * @var array Array
	 * @since 1.0.0 1.0.0
	 */
	private static $loaded_cores=array();
	
	
	/**
	 * loaded_plugins
	 * 
	 * List of loaded plugins based on 77 core.
	 * 
	 * @var array array
	 * @since 1.0.0 1.0.0
	 */
	private static $loaded_plugins = array();
	
	
	/**
	 * update_data
	 * 
	 * Data about plugins updates received from updates API
	 * 
	 * @var array array
	 * @since 1.0.0 1.0.0
	 */
	private static $update_data = array();
	
	
	/**
	 * license_keys
	 * 
	 * List of plugins license keys.
	 * 
	 * @var array array
	 * @since 1.0.0 1.0.0
	 */
	private static $license_keys = array();
	
	
	/**
	 * Init
	 * 
	 * Initializes cores and plugins (public, static).
	 * 
	 * @param string $core_root_dir Path to core root directory.
	 * @return void
	 * @since 1.0.0
	 */
	public static function Init($core_root_dir){
		
		$core_version = basename($core_root_dir);
		
		/* Loading and initializing Core when not loaded and initialized BEGIN */
			
			if(!isset(self::$loaded_cores[$core_version])){
				
				$core_class = self::NsPack($core_version, 'Core');
				
				if(!class_exists($core_class)){
					
					$core_loader_path = $core_root_dir.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'Core.class.php';
					
					if(file_exists($core_loader_path)){
						
						require_once($core_loader_path);
						
						if(class_exists(self::NsPack($core_version, 'Core'))){
							
							if(in_array('WP77_Core_Interface', class_implements(self::NsPack($core_version, 'Core')))){
								
								self::$loaded_cores[$core_version] = $_core = new $core_class();
							}
							else{
								
								if(WP77_DEBUG){
									
									echo '<b>Critical WP77 Error</b><br><b>Error:</b> Core class must implements WP77_Core_Interface interface.<br><b>Core version:</b> '.$core_version;
									exit;
								}
							}
						}
						else{
							
							echo '<b>Critical WP77 Error</b><br><b>Error:</b> Class <b>'.self::NsPack($core_version, 'Core').'</b> not exists.<br><b>Core version:</b> '.$core_version;
							exit;
						}
					}
					else{
						
						if(WP77_DEBUG){
							
							echo '<b>Critical WP77 Error</b><br><b>Error:</b> File of core loader not found in target destination.<br><b>Core version:</b> '.$core_version.'<br><b>Target destination:</b> '.$core_loader_path;
							exit;
						}
					}
				}
				else{
					
					if(WP77_DEBUG){
						
						echo '<b>Critical WP77 Error</b><br><b>Error:</b> Core loader was loaded in non proper way.<br><b>Core version:</b> '.$core_version;
						exit;
					}
				}
			}
			else{
				
				$_core = self::$loaded_cores[$core_version];
			}
			
		/* Loading and initializing Core when not loaded and initialized END */
		/* Initializing Plugin BEGIN */
			
			$_plugin = $_core -> InitPlugin($core_root_dir);
			
			if(is_object($_plugin)){
				
				if(get_class($_plugin) == self::NsPack($core_version, 'Plugin')){
					
					if(in_array('WP77_Plugin_Interface', class_implements(self::NsPack($core_version, 'Plugin')))){
						
						self::$loaded_plugins[$_plugin -> GetID()] = $_plugin;
					}
					else{
						
						echo '<b>Critical WP77 Error</b><br><b>Error:</b> Plugin class must implements WP77_Plugin_Interface interface.<br><b>Core version:</b> '.$core_version;
						exit;
					}
				}
				else{
					
					echo '<b>Critical WP77 Error</b><br><b>Error:</b> Method Core::InitPlugin must returns instance of '.self::NsPack($core_version, 'Plugin').' class but instance of '.get_class($_plugin).' returned.<br><b>Core version:</b> '.$core_version;
					exit;
				}
			}
			else{
				
				if(WP77_DEBUG){
					
					echo '<b>Critical WP77 Error</b><br><b>Error:</b> Method Core::InitPlugin must returns object, '.gettype($_plugin).' returned.<br><b>Core version:</b> '.$core_version;
					exit;
				}
			}
			
		/* Initializing Plugin END */
		
		return array($_core, $_plugin);
	}
	
	
	/**
	 * VerifyLicenseKey
	 * 
	 * Verifies license key of plugin with given ID via remote API.
	 * 
	 * @param string $plugin_id ID of plugin.
	 * @param string $license_key License key.
	 * @return boolean Returns true when license key is valid, false on error or when license key is not valid.
	 * @since 1.0.0
	 */
	public static function VerifyLicenseKey($plugin_id, $license_key){
		
		return true;
	}
	
	
	/**
	 * RegisterLicenseKey
	 * 
	 * Registers license key for plugin with given ID.
	 * 
	 * @param string $plugin_id ID of plugin.
	 * @param string $license_key License key.
	 * @return boolean Returns true on success (when plugin with given ID exists), false on fail.
	 * @since 1.0.0
	 */
	public static function RegisterLicenseKey($plugin_id, $license_key){
		
		if(isset(self::$loaded_plugins[$plugin_id])){
			
			self::$license_keys[$plugin_id] = $license_key;
			return true;
		}
		
		return false;
	}
	
	
	/**
	 * CurrentSection
	 * 
	 * Determines current section type.
	 * 
	 * @return string Returns identifier of current section.
	 * @since 1.0.0
	 */
	public static function CurrentSection(){
		
		global $pagenow;
		
		/* Detecting Current Section BEGIN */
			
			$section = '';
			
			if(is_admin()){
			// Panel
				
				$section = 'admin/panel';
			}
			else{
				
				if($pagenow == 'wp-login.php'){
				// Login / Register / Recovery
					
					if(isset($_GET['action'])){
						
						if($_GET['action'] == 'lostpassword'){
							
							$section = 'admin/recovery';
						}
						elseif($_GET['action'] == 'register'){
							
							$section = 'admin/register';
						}
						else{
							
							$section = 'admin/login';
						}
					}
					else{
						
						$section = 'admin/login';
					}
				}
				else{
				// Site
					
					$section = 'site';
				}
			}
			
		/* Detecting Current Section END */
		
		return $section;
	}
	
	
	/**
	 * Version2Ns
	 * 
	 * Converts standard format version (example: "1.0.0") to "namespace friendly" version (example: "V1_0_0").
	 * 
	 * @param string $version Standard format version (example: "1.0.0").
	 * @return string Returns "Namespace friendly" version (example: "V1_0_0").
	 * @since 1.0.0
	 */
	public static function Version2Ns($version){
		
		return 'V'.str_replace('.', '_', $version);
	}
	
	
	/**
	 * Ns2Version
	 * 
	 * Converts "namespace friendly" version (example: "V1_0_0") to standard format version (example: "1.0.0").
	 * 
	 * @param string $namespace "Namespace friendly" version (example: "V1_0_0").
	 * @return string Returns version in standard format (example: "1.0.0").
	 * @since 1.0.0
	 */
	public static function Ns2Version($namespace){
		
		return str_replace(array('V', '_'), array('', '.'), $namespace);
	}
	
	
	/**
	 * NsPack
	 * 
	 * Converts input data to namespace.
	 * 
	 * @param string $core_version Version of core.
	 * @param string $class_name Name of class.
	 * @return string Returns namespace to given class, based on given core_version.
	 * @since 1.0.0
	 */
	public static function NsPack($core_version, $class_name){
		
		return 'WP77\\'.self::Version2Ns($core_version).'\\'.$class_name;
	}
	
	
	/**
	 * NsUnpack
	 * 
	 * Extracts data (core_version, class_name) from given namespace.
	 * 
	 * @param string $namespace Namespace.
	 * @return array|false Returns array with informations extracted from namespace on success, or false on fail.
	 * @since 1.0.0
	 */
	public static function NsUnpack($namespace){
		
		list(, $version_ns, $class_name) = $ns_exp = explode('\\', $namespace);
		
		return array(
			
			'core_version'		=>		self::Ns2Version($version_ns), 
			'class_name'		=>		$class_name
		);
	}
	
	
	/**
	 * GetLoadedCores
	 * 
	 * Gets value of $loaded_cores property, or array value associated with given key specified in $core_version param.
	 * If $core_version param is set and core with specified version was loaded, returns Core object.
	 * In case when core with specified version was not loaded returns false.
	 * 
	 * @param string $core_version Version of core.
	 * @return array|Core|false Returns value of $loaded_cores property, or $loaded_cores[$core_version]/false when $core_version param was specified.
	 * @since 1.0.0
	 */
	public static function GetLoadedCores($core_version=false){
		
		if($core_version){
			
			if(isset(self::$loaded_cores[$core_version])){
				
				return self::$loaded_cores[$core_version];
			}
			else{
				
				return false;
			}
		}
		else{
			
			return self::$loaded_cores;
		}
	}
	
	
	/**
	 * GetLoadedPlugins
	 * 
	 * Gets value of $loaded_plugins property, or array value associated with key specified in $plugin_id param.
	 * If $plugin_id param is set and plugin with specified ID was loaded, returns Plugin object.
	 * In case when plugin with specified ID was not loaded returns false.
	 * 
	 * @param string $plugin_id ID of plugin.
	 * @return array|Plugin|false Returns value of $loaded_plugins property, or $loaded_plugins[$plugin_id]/false when $plugin_id param was specified.
	 * @since 1.0.0
	 */
	public static function GetLoadedPlugins($plugin_id=false){
		
		if($plugin_id){
			
			if(isset(self::$loaded_plugins[$plugin_id])){
				
				return self::$loaded_plugins[$plugin_id];
			}
			else{
				
				return false;
			}
		}
		else{
			
			return self::$loaded_plugins;
		}
	}
	
	
	/**
	 * GetUpdateData
	 * 
	 * Gets value of $update_data property.
	 * 
	 * @return array Returns value of $update_data property.
	 * @since 1.0.0
	 */
	public static function GetUpdateData(){
		
		return self::$update_data;
	}
	
	
	/**
	 * GetLicenseKeys
	 * 
	 * Gets value of $license_keys property.
	 * 
	 * @return array Returns value of $license_keys property.
	 * @since 1.0.0
	 */
	public static function GetLicenseKeys(){
		
		return self::$license_keys;
	}
	
}
?>