$(document).ready(function() {
	$.ajax({
		url: 'SongRest.php?uid=1',
		success: function(data) {
			$('#test').html(data);
		}
	});
});
