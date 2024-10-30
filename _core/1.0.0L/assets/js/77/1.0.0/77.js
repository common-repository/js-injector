((function ($){
	
	if(typeof $.fn.on == 'undefined'){
		
		$.fn.on = function (events, selector, handler){
			
			return $(this).delegate(selector, events, handler);
		};
	}
	
	$(document).on('change', 'input[type="checkbox"][data-77-scroll-target]', function (e){
		
		var targetContainer = $('#'+$(this).attr('data-77-scroll-target'));
		
		if(targetContainer.length){
			
			var duration = (e.originalEvent)?400:false;
			
			if($(this).is(':checked')){
				
				$(targetContainer).stop(false, false).show(duration);
			}
			else{
				
				$(targetContainer).stop(false, false).hide(duration);
			}
		}
	}).ready(function (){
		
		$('input[type="checkbox"][data-77-scroll-target]').trigger('change');
	});
	
	var autoHeightTarget = false;
	var autoHeightLinesNumber = false;
	
	$(document).on('keypress keyup keydown change cut paste drop', '.wrap-77 textarea.textarea-auto-height', function (e){
		
		var data = $(this).val();
		autoHeightLinesNumber = data.split(/\r\n|\r|\n/).length;
		
		if((e.type == 'keypress') && (typeof e.keyCode !== 'undefined') && (e.keyCode == 13)){
			
			autoHeightLinesNumber++;
		}
		
		autoHeightTarget = this;
		
		if((e.type == 'cut') || (e.type == 'paste') || (e.type == 'drop')){
			
			setTimeout(function (){
				
				$(autoHeightTarget).trigger('keydown');
			}, 0);
			
			$(autoHeightTarget).trigger('keydown');
		}
		else{
			
			$(autoHeightTarget).attr('rows', Math.max(autoHeightLinesNumber, 5));
		}
		
	}).ready(function (){
		
		$(this).find('.wrap-77 textarea.textarea-auto-height').trigger('keyup');
	});
})(jQuery));