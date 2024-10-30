<?php
/**
 * FileHeaders.class.php
 * 
 * @file ./_core/1.0.0/classes/FileHeaders.class.php
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
	 * FileHeaders class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class FileHeaders{
		
		/**
		 * GetFileData
		 * 
		 * Retrieve metadata from a file.
		 * 
		 * @param string $file Path to the file.
		 * @param array $default_headers List of headers, in the format array('HeaderKey' => 'Header Name').
		 * @param string $context If specified adds filter hook 'extra_$context_headers'.
		 * @return array Returns array of file headers in HeaderKey => Header Value format.
		 * @link https://developer.wordpress.org/reference/functions/get_file_data/
		 * @since 1.0.0
		 */
		public static function GetFileData($file, $default_headers=array(), $context=''){
			
			// Introduced: 2.9.0
			return \get_file_data($file, $default_headers, $context);
		}
		
		
		/**
		 * GetPluginData
		 * 
		 * Parses the plugin contents to retrieve plugins metadata.
		 * 
		 * @param string $plugin_file Path to the main plugin file.
		 * @param boolean $markup If the returned data should have HTML markup applied.
		 * @param boolean $translate If the returned data should be translated.
		 * @return array Returns array of plugin headers in HeaderKey => Header Value format.
		 * @link https://developer.wordpress.org/reference/functions/get_plugin_data/
		 * @since 1.0.0
		 */
		public static function GetPluginData($plugin_file, $markup=true, $translate=true){
			
			// Introduced: 1.5.0
			return \get_plugin_data($plugin_file, $markup, $translate);
		}
		
	}
	
}
?>