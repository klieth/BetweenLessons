
$(document).ready(function() {
	var curUser = User.all['jbrown'];
	$("#user").text("Hello, " + curUser.name);
	$("#userName").text("User Name: " + curUser.userName);
	$("#user").text("About me: " + curUser.about);
	$("#user").text("Account created: " + curUser.created);
	$("#user").text("Age: " + curUser.age);
	$("#location").text("Location: " + curUser.location);

});
