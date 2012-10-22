
$(document).ready(function() {
	var curUser = User.all['jbrown'];
	$("#user").text("Hello, " + curUser.name);
	$("#userName").text("User Name: " + curUser.userName);
	$("#about").text("About me: " + curUser.about);
	$("#created").text("Account created: " + curUser.created);
	$("#age").text("Age: " + curUser.age);
	$("#location").text("Location: " + curUser.location);

});
