/**
 * Populates tables as necessary.
 */
$(document).ready(function() {
	var evenodd = false;
	jQuery.each(Song.all, function(index, song) {
		var newrow = $("<tr></tr>");
		var str = evenodd ? "even" : "odd";
		evenodd = !evenodd;
		newrow.addClass(str);
		newrow.append("<td>" + song.title + "</td>");
		newrow.append("<td>" + song.composer + "</td>");
		newrow.append("<td>" + song.tempo + " BPM</td>");
		newrow.append("<td>" + song.genre + "</td>");
		newrow.append("<td>" + song.startDate + "</td>");
		newrow.append("<td>" + song.comments + "</td>");
		newrow.append("<td class=\"button deletebutton\">delete</td>");
		$("#SongInfo").append(newrow);
		
		//$("#SongInfo").append("<tr><td>" + song.title + "</td>");
		//$("#SongInfo").append("<td>" + song.composer + "</td>");
		//$("#SongInfo").append("<td>" + song.tempo + " BPM" + "</td>");
		//$("#SongInfo").append("<td>" + song.genre + "</td>");
		//$("#SongInfo").append("<td>" + song.startDate + "</td>");
		//$("#SongInfo").append("<td>" + song.comments + "</td></tr>");
	});

	$(".deletebutton").click(function() {
		$(this).parent().remove();
		// select the tbody, for each of the rows
		evenodd = false;
		$("#SongInfo > tr").each(function(idx,elem) {
			$(elem).removeClass("odd even");
			var str = evenodd ? "even" : "odd";
			evenodd = !evenodd;
			$(elem).addClass(str);
		});
	});

});
