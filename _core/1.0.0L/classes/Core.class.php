<?php
/**
 * Core.class.php
 * 
 * @file ./_core/1.0.0/classes/Core.class.php
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
	 * Core class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Core implements \WP77_Core_Interface{
		
		/**
		 * version
		 * 
		 * Core version.
		 * 
		 * @var string String
		 * @since 1.0.0 1.0.0
		 */
		private $version;
		
		
		/**
		 * initiator_id
		 * 
		 * ID of core initiator.
		 * 
		 * @var string String
		 * @since 1.0.0 1.0.0
		 */
		private $initiator_id;
		
		
		/**
		 * root_dir
		 * 
		 * Path of core root directory.
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
		 * __construct
		 * 
		 * Core class constructor.
		 * 
		 * @param void This method not receive any params.
		 * @return self
		 * @since 1.0.0
		 */
		public function __construct(){
			
			/* Getting informations from current path BEGIN */
				
				$root_dir = dirname(__DIR__);
				$initiator_id = basename(dirname(dirname($root_dir)));
				$version = basename($root_dir);
				$root_url = WP_PLUGIN_URL.'/'.$initiator_id.'/_core/'.$version;
				
				$this -> version = $version;
				$this -> initiator_id = $initiator_id;
				$this -> root_dir = $root_dir;
				$this -> root_url = $root_url;
				
			/* Getting informations from current path END */
			
			
			include_once('Actions.class.php');
			include_once('FileHeaders.class.php');
			include_once('FileSystem.class.php');
			include_once('Filters.class.php');
			include_once('Formatting.class.php');
			include_once('HTTP.class.php');
			include_once('Icons.class.php');
			include_once('MenuPages.class.php');
			include_once('Nonces.class.php');
			include_once('Options.class.php');
			include_once('Permissions.class.php');
			include_once('Plugin.class.php');
			include_once('Redirects.class.php');
			include_once('Scripts.class.php');
			include_once('Shortcodes.class.php');
			include_once('Styles.class.php');
			include_once('Transients.class.php');
			include_once('UI.class.php');
			
			
			if(!class_exists('\\csstidy')){
				
				include_once($this -> root_dir.'/libraries/CSSTidy/1.5.5/class.csstidy.php');
			}
			
			
			$_core = $this;
			
			Actions::Add('admin_enqueue_scripts', function () use ($_core){
				
				if((Styles::StyleIs('font-awesome', 'registered')) || (Styles::StyleIs('font-awesome', 'enqueued'))){
					
					Styles::Deregister('font-awesome');
					Styles::Dequeue('font-awesome');
				}
				
				Styles::Register('font-awesome', $_core -> GetRootURL().'/assets/css/font-awesome/4.7.0/font-awesome.min.css', false, '4.7.0');
				Styles::Enqueue('font-awesome');
				
				
				if((Styles::StyleIs('77', 'registered')) || (Styles::StyleIs('77', 'enqueued'))){
					
					Styles::Deregister('77');
					Styles::Dequeue('77');
				}
				
				Styles::Register('77', $_core -> GetRootURL().'/assets/css/77/1.0.0/77.min.css', false, '1.0.0');
				Styles::Enqueue('77');
				
				
				if((Scripts::ScriptIs('77', 'registered')) || (Scripts::ScriptIs('77', 'enqueued'))){
					
					Scripts::Deregister('77');
					Scripts::Dequeue('77');
				}
				
				Scripts::Register('77', $_core -> GetRootURL().'/assets/js/77/1.0.0/77.min.js', false, '1.0.0');
				Scripts::Enqueue('77');
			});
		}
		
		
		/**
		 * InitPlugin
		 * 
		 * Initializes plugin.
		 * 
		 * @param string $core_root_dir Path to core root directory.
		 * @return object Returns created instance of Plugin class.
		 * @since 1.0.0
		 */
		public function InitPlugin($core_root_dir){
			
			return new Plugin($core_root_dir);
		}
		
		
		/**
		 * Call
		 * 
		 * Calls to selected method of selected object inside namespace of current core instance.
		 * 
		 * @param string $object Name of class to call.
		 * @param string $method Name of method to call.
		 * @param array $params List of method params.
		 * @return mixed Returns result of executed method on success or false on fail.
		 * @since 1.0.0
		 */
		public function Call($object, $method, $params=array()){
			
			return call_user_func_array(array(__NAMESPACE__.'\\'.$object, $method), $params);
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
		}
		
		
		/**
		 * GetInitiatorID
		 * 
		 * Getter of $initiator_id property.
		 * 
		 * @param void This method not receive any params.
		 * @return string Returns value of $initiator_id property.
		 * @since 1.0.0
		 */
		public function GetInitiatorID(){
			
			return $this -> initiator_id;
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
		
	}
	
}
?>