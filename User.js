/**
 * User object
 */

var User = function(userName, name, about, date, age, location){
	
	this.userName = userName;
	this.name = name;
	this.about = about;
	this.dateCreated = date;
	this.age = age;
	this.location = location;
	this.currentWork = {};
	this.masteredWorks = {};
	this.wantToLearn = {};
	
}

var addCurrentWork = function(song){
	this.currentWork[song.title] = song;
}

var addMasteredWorks = function(song){
	this.MasteredWorks[song.title] = song;
}

var addWantToLearn = function(song){
	this.wantToLearn[song.title] = song;
}


