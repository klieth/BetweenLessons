
$(document).ready(function() {
	var curUser = User.all['jbrown'];
	$("#user").setText("Hello, " + curUser.name);
	$("#userName").setText("User Name: " + curUser.userName);
	$("#user").setText("About me: " + curUser.about);
	$("#user").setText("Account created: " + curUser.created);
	$("#user").setText("Age: " + curUser.age);
	$("#location").setText("Location: " + curUser.location);

});
