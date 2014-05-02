/**
 * @author Torstein Hønsi
 * @maintainer Jon Arild Nygård
 */
(function ($) {

jQuery(document).ready(function() {
	/*jQuery('#demo-menu a').each(function() { // highlight active menu
		var linkedExample = (/demo\/([a-z\-]*)/.exec(this.href) || [])[1];
		if (linkedExample == example) {
			this.parentNode.className = 'active';
			$(this.parentNode.parentNode.parentNode.parentNode).addClass('active');
			$(this.parentNode.parentNode.parentNode.parentNode).children('h4').addClass('active');
		}
	});*/

	$('.menu-toggle').click(function() {
		var el = $(this).next('.menu-content'); 
		if (el.is(':visible')) {

		} else {
			$('.menu-content').slideUp();
			$('.demo-menu-item.active').removeClass('active');
			isVisible = el.is(':visible') ? el.slideUp() : el.slideDown();
			$(this.parentNode).addClass('active');
	    	
		}	    
	});
	
	// key listeners for the previous and next arrows
	jQuery(document).keydown(function (e) {
		var anchor;
		if (e.target.tagName != 'INPUT') {
			if (e.keyCode == 39) {
				anchor = document.getElementById('next-example');
				
			}
			else 
				if (e.keyCode == 37) {
				anchor = document.getElementById('previous-example');
			}
			
			if (anchor) { 
				location.href = anchor.href;
			}				
		}
		
	});

	// Related to page size
	$('#view-menu').click(function () {
		var el = $('#demo-menu'); 
		if (el.is(':visible')) {
			$(this).html("Show Menu");
			el.slideUp("slow");
		} else {
			$(this).html("Hide Menu");
			el.slideDown("slow");
		}
	});
	$('#view-theme').click(function () {
		$(document.body).toggleClass('theme-open');
	});

	setTimeout(function(){
		// Hide the address bar!
		window.scrollTo(0, 1);
	}, 0);
});

function viewOptions(btn, example) {
	var options = demo[example].options, 
		s = '';
		
	function clean(str) {
		return str.replace(/</g, '&lt;').replace(/>/g, '&gt;');
	}
	
	function doLevel(level, obj) {
		jQuery.each(obj, function(member, value) {
			// compute indentation
			var indent = '';
			for (var j = 0; j < level; j++) indent += '	';
			
			if (typeof value == 'string')
				s += indent + member +": '"+ clean(value) +"',\n";
				
			else if (typeof value == 'number')
				s += indent + member +": "+ value +",\n";
				
			else if (typeof value == 'function')
				s += indent + member +": "+ clean(value.toString()) +",\n";
				
			else if (jQuery.isArray(value)) {
				s += indent + member +": [";
				$.each(value, function(member, value) {
					if (typeof value == 'string')
						s += "'"+ clean(value) +"', ";
						
					else if (typeof value == 'number')
						s += value +", ";
					
					else if (typeof value == 'object') {
						s += indent +"{\n";
						doLevel(level + 1, value);
						s += indent +"}, ";
					}
					
				});
				s = s.replace(/, $/, '');
				s += "],\n";
			}
				
			else if (typeof value == 'object') {
				s += indent + member +": {\n";
				doLevel(level + 1, value);
				s += indent +"},\n";
			}
			
		});
		// strip out stray commas
		//s = s.replace(/,([\s]?)$/, '\n$1}');
	};
	
	doLevel(0, options);
	
	// strip out stray commas
	s = s.replace(/,\n([\s]?)}/g, '\n$1}');
	s = s.replace(/,\n$/, '');
	
	// pop up the Highslide
	hs.htmlExpand(btn, { 
		width: 1000,
		align: 'center',
		dimmingOpacity: .1,
		allowWidthReduction: true,  
		headingText: 'Configuration options',
		wrapperClassName: 'titlebar',
		maincontentText: '<pre style="margin: 0">'+ s +'</pre>'
	});
}

}(jQuery));


