$(document).ready(function() {
	$.ajax({
		url: 'SongRest.php?uid=1'
	}).done(function(data){
		$.each(data, function(index, value){
			console.log(index + ": " + value);
			$('#test').append($('<p>' + value.sid + '</p>'));
			fillInfo(value);
		});
	});
});

var fillInfo = function(value) {
	$.ajax({
		url: 'SongRest.php/' + value.sid,
		data: {uid:'1'}
	}).done(function(data) {
		var s = new Song(data.title,data.composer,data.tempo,data.genre,data.date,data.comments);
		s.display();
	});
}
