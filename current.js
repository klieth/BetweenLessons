$(document).ready(function() {
	$.ajax({
		url: 'SongRest.php?uid=1'
	}).done(function(data){
		$.each(data, function(index, value){
			console.log(index + ": " + value);
			//$('#test').append($('<p>' + value.sid + '</p>'));
			fillInfo(value);
		});
	});
	$("#addSong").submit(addSong);
});

var fillInfo = function(value) {
	$.ajax({
		url: 'SongRest.php/' + value.sid,
		data: {uid:'1'}
	}).done(function(data) {
		var s = new Song(data.title,data.composer,data.tempo,data.genre,data.date,data.comments,data.sid);
		s.display();
	});
}

var addSong = function() {
	var title = $("#songtitle").val();
	var composer = $("#composer").val();
	var tempo = $("#tempo").val();
	var genre = $("#genre").val();
	var date = $("#date").val();
	var comments = $("#comments").val();
	var s = new Song(title, composer, tempo, genre, date, comments);
	s.display();
	s.addToDB();
}
