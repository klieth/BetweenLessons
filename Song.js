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
}


Song.prototype.setComment = function(comments){
	this.comments = comments;
}


Song.prototype.getTitle = function(){
	return this.title;
}


Song.prototype.getComposer = function(){
	return this.composer;
}


Song.prototype.getTempo = function(){
	return this.tempo;
}


Song.prototype.getGenre = function(){
	return this.genre;
}


Song.prototype.getStartDate = function(){
	return this.startDate;
}


Song.prototype.getComments = function(){
	return this.comments;
}
