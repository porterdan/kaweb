jQuery(document).ready(function($){
	$('#ww_calculator').on('submit', function(e){

		var form = this;

		var widgets = $('input[name="no_widgets"]').val();

		jQuery.ajax({
			method: 'post',
			url: wwvars.ajaxurl,
			data: $(form).serialize(),

		}).success(function(data) {
				$('#pack-results').html(data);
		});

		e.preventDefault();
	});

});