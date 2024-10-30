<?php
/**
 * FileSystem.class.php
 * 
 * @file ./_core/1.0.0/classes/FileSystem.class.php
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
	 * FileSystem class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class FileSystem{
		
		/**
		 * filesystem_object
		 * 
		 * Instance of WP_FileSystem_Base.
		 * 
		 * @var WP_FileSystem_Base WP_FileSystem_Base
		 * @since 1.0.0 1.0.0
		 */
		private static $filesystem_object;
		
		
		/**
		 * __construct
		 * 
		 * Class constructor.
		 * 
		 * @return self
		 * @since 1.0.0
		 */
		function __construct(){
			
			self::$filesystem_object = new \WP_Filesystem_Direct();
		}
		
		
		/**
		 * AccessTime
		 * 
		 * Gets the file last access time.
		 * 
		 * @param string $file Path to file.
		 * @return int|boolean Unix timestamp representing last access time.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/atime/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/atime/
		 * @since 1.0.0
		 */
		public static function AccessTime($file){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> atime($file);
		}
		
		
		/**
		 * Copy
		 * 
		 * Copy a file.
		 * 
		 * @param string $source Path to the source file.
		 * @param string $destination Path to the destination file.
		 * @param boolean $overwrite Whether to overwrite the destination file if it exists.
		 * @param int $mode The permissions as octal number, usually 0644 for files, 0755 for dirs.
		 * @return boolean Returns true if file copied successfully, False otherwise.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/copy/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/copy/
		 * @since 1.0.0
		 */
		public static function Copy($source, $destination, $overwrite=false, $mode=false){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> copy($source, $destination, $overwrite, $mode);
		}
		
		
		/**
		 * Delete
		 * 
		 * Delete a file or directory.
		 * 
		 * @param string $file Path to the file.
		 * @param boolean $recursive If set True changes file group recursively. Defaults to False.
		 * @param boolean $type Type of resource. 'f' for file, 'd' for directory.
		 * @return boolean Returns true if the file or directory was deleted, false on failure.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/delete/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/delete/
		 * @since 1.0.0
		 */
		public static function Delete($file, $recursive=false, $type=false){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> delete($file, $recursive, $type);
		}
		
		
		/**
		 * DirList
		 * 
		 * Get details for files in a directory or a specific file.
		 * 
		 * @param string $path Path to directory or file.
		 * @param boolean $include_hidden Whether to include details of hidden ("." prefixed) files.
		 * @param boolean $recursive Whether to recursively include file details in nested directories.
		 * @return array|boolean ???
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/dirlist/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/dirlist/
		 * @since 1.0.0
		 */
		public static function DirList($path, $include_hidden=true, $recursive=false){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> dirlist($path, $include_hidden, $recursive);
		}
		
		
		/**
		 * Exists
		 * 
		 * Check if a file or directory exists.
		 * 
		 * @param string $file Path to file/directory.
		 * @return boolean Whether $file exists or not.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/exists/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/exists/
		 * @since 1.0.0
		 */
		public static function Exists($file){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> exists($file);
		}
		
		
		/**
		 * GetContents
		 * 
		 * Read entire file into a string.
		 * 
		 * @param string $file Name of the file to read.
		 * @return mixed|boolean Returns the read data or false on failure.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/get_contents/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/get_contents/
		 * @since 1.0.0
		 */
		public static function GetContents($file){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> get_contents($file);
		}
		
		
		/**
		 * GetContentsArray
		 * 
		 * Read entire file into an array.
		 * 
		 * @param string $file Path to the file.
		 * @return array|boolean Returns file contents in an array or false on failure.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/get_contents_array/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/get_contents_array/
		 * @since 1.0.0
		 */
		public static function GetContentsArray($file){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> get_contents_array($file);
		}
		
		
		/**
		 * IsDir
		 * 
		 * Check if resource is a directory.
		 * 
		 * @param string $path Directory path.
		 * @return boolean Whether $path is a directory.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/is_dir/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/is_dir/
		 * @since 1.0.0
		 */
		public static function IsDir($path){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> is_dir($path);
		}
		
		
		/**
		 * IsFile
		 * 
		 * Check if resource is a file.
		 * 
		 * @param string $file File path.
		 * @return boolean Whether $file is a file.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/is_file/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/is_file/
		 * @since 1.0.0
		 */
		public static function IsFile($file){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> is_file($file);
		}
		
		
		/**
		 * IsReadable
		 * 
		 * Check if a file is readable.
		 * 
		 * @param string $file Path to file.
		 * @return boolean Whether $file is readable.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/is_readable/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/is_readable/
		 * @since 1.0.0
		 */
		public static function IsReadable($file){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> is_readable($file);
		}
		
		
		/**
		 * IsWritable
		 * 
		 * Check if a file or directory is writable.
		 * 
		 * @param string $file Path to file.
		 * @return boolean Whether $file is writable.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/is_writable/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/is_writable/
		 * @since 1.0.0
		 */
		public static function IsWritable($file){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> is_writable($file);
		}
		
		
		/**
		 * Mkdir
		 * 
		 * Create a directory.
		 * 
		 * @param string $path Path for new directory.
		 * @param mixed $chmod The permissions as octal number or False to skip chmod.
		 * @param mixed $chown A user name or number or False to skip chown.
		 * @param mixed $chgrp A group name or number or False to skip chgrp.
		 * @return boolean Returns false if directory cannot be created, true otherwise.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/mkdir/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/mkdir/
		 * @since 1.0.0
		 */
		public static function Mkdir($path, $chmod=false, $chown=false, $chgrp=false){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> mkdir($path, $chmod, $chown, $chgrp);
		}
		
		
		/**
		 * Move
		 * 
		 * Move a file.
		 * 
		 * @param string $source Path to the source file.
		 * @param string $destination Path to the destination file.
		 * @param boolean $overwrite Whether to overwrite the destination file if it exists.
		 * @return boolean Returns True if file copied successfully, False otherwise.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/move/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/move/
		 * @since 1.0.0
		 */
		public static function Move($source, $destination, $overwrite=false){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> move($source, $destination, $overwrite);
		}
		
		
		/**
		 * ModificationTime
		 * 
		 * Gets the file modification time.
		 * 
		 * @param string $file Path to file.
		 * @return int|boolean Returns unix timestamp representing modification time.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/mtime/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/mtime/
		 * @since 1.0.0
		 */
		public static function ModificationTime($file){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> mtime($file);
		}
		
		
		/**
		 * RemoveDir
		 * 
		 * Delete a directory.
		 * 
		 * @param string $path Path to directory.
		 * @param boolean $recursive Whether to recursively remove files/directories.
		 * @param boolean Whether directory is deleted successfully or not.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/rmdir/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/rmdir/
		 * @since 1.0.0
		 */
		public static function RemoveDir($path, $recursive=false){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> rmdir($path, $recursive);
		}
		
		
		/**
		 * Size
		 * 
		 * Gets the file size (in bytes).
		 * 
		 * @param string $file Path to file.
		 * @return int|boolean Size of the file in bytes.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/size/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/size/
		 * @since 1.0.0
		 */
		public static function Size($file){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> size($file);
		}
		
		
		/**
		 * Touch
		 * 
		 * Set the access and modification times of a file.
		 * 
		 * @param string $file Path to file.
		 * @param int $time Modified time to set for file. Default 0.
		 * @param int $atime Access time to set for file. Default 0.
		 * @return boolean Whether operation was successful or not.
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_base/touch/
		 * @link https://developer.wordpress.org/reference/classes/wp_filesystem_direct/touch/
		 * @since 1.0.0
		 */
		public static function Touch($file, $time, $atime){
			
			// Introduced: 2.5.0
			return self::$filesystem_object -> touch($file, $time, $atime);
		}
		
	}
	
}
?>