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

User.all = {};
User.all['jbrown'] = new User('jbrown', 'John Brown', "Hi, I'm John Brown. Nice to meet you!", '2012-10-22', 23, 'Chapel Hill');

var addCurrentWork = function(song){
	this.currentWork[song.title] = song;
}

var addMasteredWorks = function(song){
	this.MasteredWorks[song.title] = song;
}

var addWantToLearn = function(song){
	this.wantToLearn[song.title] = song;
}


