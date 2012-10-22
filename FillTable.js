/**
 * Populates tables as necessary.
 */
$(document).ready(function() {
	jQuery.each(Song.all, function(index, song)){
		$("#SongInfo").append("<tr><td>" + song.title + "</td>");
		$("#SongInfo").append("<td>" + song.composer + "</td>");
		$("#SongInfo").append("<td>" + song.tempo + " BPM" + "</td>");
		$("#SongInfo").append("<td>" + song.genre + "</td>");
		$("#SongInfo").append("<td>" + song.startDate + "</td>");
		$("#SongInfo").append("<td>" + song.comments + "</td></tr>");
	}

});
