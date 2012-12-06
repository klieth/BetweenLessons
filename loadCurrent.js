$(document).ready(function() {
	var ajax_url = 'SongRest.php';

	var data_map = {
		usr: '1'
	};

	var settings = {
		type: 'GET',
		data: data_map,
		success: ajax_success_handler,
		error: ajax_error_handler
	};

	$.ajax(ajax_url, settings);

	var ajax_success_handler = function(data, textStatus, jqXHR) {
		$('#test').html(jqXHR.responseText);
	}

	var ajax_error_handler = function(jqXHR, textStatus, errorThrown) {
		$('#error').html(jqXHR.responseText);
	}
});
