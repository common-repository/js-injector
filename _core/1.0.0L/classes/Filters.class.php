<?php
/**
 * Filters.class.php
 * 
 * @file ./_core/1.0.0/classes/Filters.class.php
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
	 * Filters class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Filters{
		
		/**
		 * Has
		 * 
		 * Check if any filter has been registered for a hook.
		 * 
		 * @param string $tag The name of the filter hook.
		 * @param callable $function_to_check If specified, return the priority of that function on this hook. If the specified function is not attached to this hook, returns false.
		 * @return int|boolean If no function is specified: returns true if any function is registered for this hook, or false otherwise. If a function is specified (as the second parameter): returns an integer for the priority of the hook if the function is registered, or false otherwise.
		 * @link https://developer.wordpress.org/reference/functions/has_filter/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Has($tag, $function_to_check=false){
			
			// Introduced: 2.5.0
			return \has_filter($tag, $function_to_check);
		}
		
		
		/**
		 * Add
		 * 
		 * Hook a function or method to a specific filter action.
		 * 
		 * @param string $tag The name of the filter to hook the $function_to_add callback to.
		 * @param callable $function_to_add The callback to be run when the filter is applied.
		 * @param int $priority Used to specify the order in which the functions associated with a particular action are executed. Lower numbers correspond with earlier execution, and functions with the same priority are executed in the order in which they were added to the action.
		 * @param int $accepted_args The number of arguments the function accepts.
		 * @return true Returns true.
		 * @link https://developer.wordpress.org/reference/functions/add_filter/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Add($tag, $function_to_add, $priority=10, $accepted_args=1){
			
			// Introduced: 0.71
			return \add_filter($tag, $function_to_add, $priority, $accepted_args);
		}
		
		
		/**
		 * Apply
		 * 
		 * Call the functions added to a filter hook.
		 * 
		 * @param string $tag The name of the filter hook.
		 * @param mixed $value The value on which the filters hooked to $tag are applied on.
		 * @param mixed $var Additional variables passed to the functions hooked to $tag.
		 * @return mixed Returns filtered value after all hooked functions are applied to it.
		 * @link https://developer.wordpress.org/reference/functions/apply_filters/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Apply($tag, $value, $var){
			
			// Introduced: 0.71
			return \apply_filters($tag, $value, $var);
		}
		
		
		/**
		 * ApplyRefArray
		 * 
		 * Execute functions hooked on a specific filter hook, specifying arguments in an array. This function is identical to apply_filters, but the arguments passed to the functions hooked to $tag are supplied using an array.
		 * 
		 * @param string $tag The name of the action to be executed.
		 * @param array $args The arguments supplied to the functions hooked to $tag.
		 * @return mixed Returns filtered value after all hooked functions are applied to it.
		 * @link https://developer.wordpress.org/reference/functions/apply_filters_ref_array/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function ApplyRefArray($tag, $args){
			
			// Introduced: 3.0.0
			return \apply_filters_ref_array($tag, $args);
		}
		
		
		/**
		 * Current
		 * 
		 * Retrieve the name of the current filter or action.
		 * 
		 * @return string Returns hook name of the current filter or action.
		 * @link https://developer.wordpress.org/reference/functions/current_filter/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Current(){
			
			// Introduced: 2.5
			return \current_filter();
		}
		
		
		/**
		 * Remove
		 * 
		 * Removes a function from a specified filter hook.
		 * 
		 * @param string $tag The filter hook to which the function to be removed is hooked.
		 * @param callable $function_to_remove The name of the function which should be removed.
		 * @param int $priority The priority of the function.
		 * @return boolean Returns information about function existed before it was removed.
		 * @link https://developer.wordpress.org/reference/functions/remove_filter/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Remove($tag, $function_to_remove, $priority=10){
			
			// Introduced: 1.2.0
			return \remove_filter($tag, $function_to_remove, $priority);
		}
		
		
		/**
		 * RemoveAll
		 * 
		 * Remove all of the hooks from a filter.
		 * 
		 * @param string $tag The filter to remove hooks from.
		 * @param int|boolean The priority number to remove.
		 * @return true Returns true when finished.
		 * @link https://developer.wordpress.org/reference/functions/remove_all_filters/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function RemoveAll($tag, $priority=false){
			
			// Introduced: 2.7.0
			return \remove_all_filters($tag, $priority);
		}
		
		
		/**
		 * Doing
		 * 
		 * Retrieve the name of a filter currently being processed.
		 * 
		 * @param null|string $filter Filter to check. Defaults to null, which checks if any filter is currently being run.
		 * @return boolean Returns information about whether filter is currently in the stack.
		 * @link https://developer.wordpress.org/reference/functions/doing_filter/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Doing($filter=null){
			
			if(function_exists('\doing_filter')){
				
				// Introduced: 3.9.0
				return \doing_filter($filter);
			}
			else{
				
				// Introduced: 2.5.0 (propably) - https://codex.wordpress.org/Function_Reference/current_filter
				global $wp_current_filter;
				
				if($filter == null){
					
					return !empty($wp_current_filter);
				}
				else{
					
					return isset($wp_current_filter[$filter]);
				}
			}
		}
		
	}
	
}
?>