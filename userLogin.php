<?php include 'songHeader.php' ?>
<script src="userLogin.js" type="text/javascript"></script>
<form id="userLogin" action="javascript:void(0)">
<div id="content">
	<h2 id="contentTitle">User login</h2>
			<label>Username: <input id="username" type="text" name="name"></label><br>
			<label>Password: <input id="userpass" type="text" name="password"></label><br>
			<input type="submit" value="Login"><br>
			<label>Not registered yet? <a href="userRegistration.php"> Register here.</a></label>
			</div>
		</form>
<?php include "footer.php" ?>
