(function ($) {
	insertShortcode = function(name) {
			var win = window.dialogArguments || opener || parent || top;
			var shortcode='[testcode name='+name+']';
			win.send_to_editor(shortcode);
		}

	$(function () {
		$('#insert_shortcode').bind('click',function() {
				var name = $('#name').val();
				insertShortcode(name);
		});
	});
})(jQuery);