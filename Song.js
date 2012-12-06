/**
 * Song
 * 
 * Models the songs that users will be practicing.
 */

var Song = function (title, composer, tempo, genre, startDate, comments){
	this.title = title;
	this.composer = composer;
	this.tempo = tempo;
	this.genre = genre;
	this.startDate = startDate;
	this.comments = comments;

	this.display = function() {
		var row = $('<tr></tr>');
		row.append('<td>' + this.title + '</td>');
		row.append('<td>' + this.composer + '</td>');
		row.append('<td>' + this.tempo + '</td>');
		row.append('<td>' + this.genre + '</td>');
		row.append('<td>' + this.startDate + '</td>');
		row.append('<td>' + this.comments + '</td>');
		row.append('<td class="button deletebutton">delete</td>');
		$('#SongInfo').append(row);
	}
}

Song.all = {};
Song.all['Secret Base'] = new Song('Secret Base', 'SCANDAL', 500, "J-Pop", "2012-10-18", "Anime");
Song.all['Stairway to Heaven'] = new Song('Stairway to Heaven', 'Led Zeppelin', 800, 'Rock', '2011-6-4', 'Don\'t play in the store');
Song.all['Symphony No. 5'] = new Song('Symphony No. 5', 'Beethoven', 400, 'Classical', '2012-1-1', '');
Song.all['Canon in D'] = new Song('Canon in D', 'Pachelbel', 700, 'Classical', '1992-5-8', 'Beginner');
Song.all['Gangnam Style'] = new Song('Gangnam Style', 'PSY', 800, 'K-Pop', '2011-9-1', 'Intermediate');
Song.all['Space Jam'] = new Song('Space Jam', 'Quad City DJs', 2000, 'Hip-Hop', '2012-3-4', 'Advanced');
Song.all['Blue Danbue'] = new Song('Blue Danbue', 'Strauss', 600,' Classical', '2011-7-7', 'Beginner');
Song.all['Waltz of the Flowers'] = new Song('Waltz of the Flowers', 'Tchaikovsky', 555, 'Classical', '2012-1-2', 'Intermediate');
Song.all['Piano Concerto'] = new Song('Piano Concerto', 'Grieg', 888, 'Classical', '2012-4-5', 'Advanced');
Song.all['Rooftop Run'] = new Song('Rooftop Run', 'SEGA', 650, 'Video Game', '2012-1-1', 'Advanced');
Song.all['Four Seasons'] = new Song('Four Seasons: Winter', 'Vivaldi', 777, 'Classical', '2012-12-12', 'Advanced');
Song.all['Funeral March'] = new Song('Funeral March', 'Chopin', 666, 'Classical', '2012-10-10', 'Novice');
Song.all['Mario Theme'] = new Song('Mario Theme', 'Nintendo', 400, 'Video Game', '2012-8-8', 'Intermediate');
