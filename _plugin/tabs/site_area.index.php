<?php
/**
 * site_area.index.php
 * 
 * @file ./_plugin/tabs/site_area.index.php
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


// Security fallback
if((!$_core -> Call('Permissions', 'IsSuperAdmin', array())) && (!$_core -> Call('Permissions', 'IsAdmin', array()))){ echo 'No access.'; exit; }


if(isset($_POST['submit'])){
	
	$nonce_id = $_plugin -> GetID().'-nonce';
	
	if(isset($_POST[$nonce_id])){
		
		if(!$_core -> Call('Nonces', 'Verify', array($_POST[$nonce_id], $active_tab_id))){
			
			$_core -> Call('Redirects', 'NoticeRefresh', array('error', 'Nonce expired and this page was refreshed. Please try to send form again.'));
		}
	}
	else{
		
		$_core -> Call('Redirects', 'NoticeRefresh', array('error', 'Security Error. Nonce key was not received. Please try again.'));
	}
	
	
	$_plugin -> OptionUpdate('site_js_head_enabled', ((isset($_POST['site_js_head_enabled'])) && ($_POST['site_js_head_enabled'])));
	
	if(isset($_POST['site_js_head_code'])){
		
		$head_code = $_core -> Call('Formatting', 'StripAllTags', array($_POST['site_js_head_code']));
		$head_code_safe = $head_code;
		
		$_plugin -> OptionUpdate('site_js_head_code', $head_code);
		$_plugin -> OptionUpdate('site_js_head_code_safe', $head_code_safe);
	}
	
	$_plugin -> OptionUpdate('site_js_foot_enabled', ((isset($_POST['site_js_foot_enabled'])) && ($_POST['site_js_foot_enabled'])));
	
	if(isset($_POST['site_js_foot_code'])){
		
		$foot_code = $_core -> Call('Formatting', 'StripAllTags', array($_POST['site_js_foot_code']));
		$foot_code_safe = $foot_code;
		
		$_plugin -> OptionUpdate('site_js_foot_code', $foot_code);
		$_plugin -> OptionUpdate('site_js_foot_code_safe', $foot_code_safe);
	}
	
	$_core -> Call('Redirects', 'NoticeRefresh', array('success', 'Success.'));
}
?>

<?php $_core -> Call('UI', 'PluginPageH2', array('Site JS', 'home')); ?>

<form action="" method="POST">
	
	<table class="form-table">
		
		<tbody>
			
			<tr valign="top">
				
				<th scope="row"><label for="control_site_js_head_enabled">
					
					<span class="xs-hidden">Head</span>
					<span class="xs-visible">Head JS</span>
				</label></th>
				<td>
					
					<fieldset>
						
						<label><input type="checkbox" id="control_site_js_head_enabled" name="site_js_head_enabled"<?php if(isset($_POST['submit'])){ if(isset($_POST['site_js_head_enabled'])){ if($_POST['site_js_head_enabled']){ echo ' checked'; } } }else{ if($_plugin -> OptionGet('site_js_head_enabled')){ echo ' checked'; } } ?> data-77-scroll-target="div_site_js_head">&nbsp; Enable</label>
						
						
						<div id="div_site_js_head"<?php if(!$_plugin -> OptionGet('site_js_head_enabled')){ echo ' style="display: none;"'; } ?>>
							
							<br>
							<textarea type="text" id="control_site_js_head_code" name="site_js_head_code" rows="5" colsx="50" autocapitalize="off" spellcheck="false" class="large-text code textarea-auto-height" placeholder="Paste or write JS code here."><?php if(isset($_POST['site_js_head_code'])){ echo stripslashes($_POST['site_js_head_code']); }else{ if($_plugin -> OptionGet('site_js_head_code')){ echo stripslashes($_plugin -> OptionGet('site_js_head_code')); } } ?></textarea>
							<p class="description">Please be careful. Code will be updated immediately after You save changes.</p>
						</div>
					</fieldset>
				</td>
			</tr>
			<tr valign="top">
				
				<th scope="row"><label for="control_site_js_foot_enabled">
					
					<span class="xs-hidden">Footer</span>
					<span class="xs-visible">Footer JS</span>
				</label></th>
				<td>
					
					<fieldset>
						
						<label><input type="checkbox" id="control_site_js_foot_enabled" name="site_js_foot_enabled"<?php if(isset($_POST['submit'])){ if(isset($_POST['site_js_foot_enabled'])){ if($_POST['site_js_foot_enabled']){ echo ' checked'; } } }else{ if($_plugin -> OptionGet('site_js_foot_enabled')){ echo ' checked'; } } ?> data-77-scroll-target="div_site_js_foot">&nbsp; Enable</label>
						
						<div id="div_site_js_foot"<?php if(!$_plugin -> OptionGet('site_js_foot_enabled')){ echo ' style="display: none;"'; } ?>>
							
							<br>
							<textarea type="text" id="control_site_js_foot_code" name="site_js_foot_code" rows="5" cols="50" autocapitalize="off" spellcheck="false" class="large-text code textarea-auto-height" placeholder="Paste or write JS code here."><?php if(isset($_POST['site_js_foot_code'])){ echo stripslashes($_POST['site_js_foot_code']); }else{ if($_plugin -> OptionGet('site_js_foot_code')){ echo stripslashes($_plugin -> OptionGet('site_js_foot_code')); } } ?></textarea>
							<p class="description">Please be careful. Code will be updated immediately after You save changes.</p>
						</div>
					</fieldset>
				</td>
			</tr>
		</tbody>
	</table>
	
	<?php $_core -> Call('Nonces', 'Field', array($active_tab_id, $_plugin -> GetID().'-nonce')); ?>
	
	<?php $_core -> Call('UI', 'PluginFormButtons', array(array(
		
		'Save Changes'		=>		'submit'
	))); ?>
</form>