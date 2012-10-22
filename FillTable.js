/**
 * Populates tables as necessary.
 */
$(document).ready(function() {
	var evenodd = false;
	jQuery.each(Song.all, function(index, song) {
		var newrow = $("<tr class=\"" + evenodd ? "even" : "odd"  + "\"></tr>");
		newrow.append("<td>" + song.title + "</td>");
		newrow.append("<td>" + song.composer + "</td>");
		newrow.append("<td>" + song.tempo + " BPM</td>");
		newrow.append("<td>" + song.genre + "</td>");
		newrow.append("<td>" + song.startDate + "</td>");
		newrow.append("<td>" + song.comments + "</td>");
		$("#SongInfo").append(newrow);
		
		//$("#SongInfo").append("<tr><td>" + song.title + "</td>");
		//$("#SongInfo").append("<td>" + song.composer + "</td>");
		//$("#SongInfo").append("<td>" + song.tempo + " BPM" + "</td>");
		//$("#SongInfo").append("<td>" + song.genre + "</td>");
		//$("#SongInfo").append("<td>" + song.startDate + "</td>");
		//$("#SongInfo").append("<td>" + song.comments + "</td></tr>");
	});

});
