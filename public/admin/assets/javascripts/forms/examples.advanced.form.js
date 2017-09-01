(function($) {

	$('.confirmation-callback').confirmation({
		onConfirm: function() {
			alert('You clicked: confirm' );
		},
		onCancel: function() {
			alert('You clicked: cancel' );
		}
	});

}(jQuery));