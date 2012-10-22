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
	});

	$(".deletebutton").click(function() {
		$(this).parent().remove();
		resetColors();
	});

	$("#addSong").submit(function() {
		var newrow = $("<tr></tr>");
		newrow.append("<td>" + $("title").val() + "</td>");
		newrow.append("<td>" + $("composer").val() + "</td>");
		newrow.append("<td>" + $("tempo").val() + " BPM</td>");
		newrow.append("<td>" + $("genre").val() + "</td>");
		newrow.append("<td>" + $("date").val() + "</td>");
		newrow.append("<td>" + $("comments").val() + "</td>");
		newrow.append("<td class=\"button deletebutton\">delete</td>");
		$("#SongInfo").append(newrow);
		resetColors();
	});

});

function resetColors() {
	var evenodd = false;
	$("#SongInfo > tr").each(function(idx,elem) {
		$(elem).removeClass("odd even");
		var str = evenodd ? "even" : "odd";
		evenodd = !evenodd;
		$(elem).addClass(str);
	});
}
