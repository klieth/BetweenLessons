$(document).ready(function() {
	$.ajax({
		url: 'SongRest.php?uid=1'
	}).done(function(data){
		if (console && console.log) {
			console.log("Sample of data:", data.slice (0,3));
		}
	});
});
