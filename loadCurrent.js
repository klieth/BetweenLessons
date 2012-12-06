$(document).ready(function() {
	$.ajax({
		url: 'SongRest.php?uid=1'
	}).done(function(data){
		$.each(data, function(index, value){
			console.log(index + ": " + value);
			$('#test').append($('p').html(value));
		});
	});
});
