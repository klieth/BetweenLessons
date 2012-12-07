$(document).ready(function() {
	$('#userLogin').submit(auth);
});

var auth = function() {
	var f = $('#username').val();
	var p = $('#userpass').val();
	$.ajax({
		url: 'UserRest.php',
		data: {first: f, pass: p}
	}).done(function(data) {
		console.log("returned: " + data);
	});
}
