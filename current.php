<html>
	<head>
		<title>Between Lessons</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="Song.js"></script>
		<script type="text/javascript" src=""></script>
	</head>
	<body>
		<div id="container">
			<?php include 'header.php' ?>
			<div id="content">
				<h2 id="contentTitle">Current Work</h2>
				<table>
					<thead>
						<tr>
							<td>Title</td>
							<td>Composer</td>
							<td>Tempo</td>
							<td>Genre</td>
							<td>Start Date</td>
							<td>Comments</td>
							<td>Options</td>
						</tr>
					</thead>
					<tbody>
						<tr class="even">
							<td>Piece #1</td>
							<td>Composer #1</td>
							<td>500bpm</td>
							<td>Death metal</td>
							<td>9/14/2012</td>
							<td>Quite difficult</td>
							<td><a href="">delete</a>, <a href="">edit</a>, <a href="">mastered</a></td>
						</tr>
						<tr class="odd">
							<td>Piece #2</td>
							<td>Composer #2</td>
							<td>800bpm</td>
							<td>Death metal</td>
							<td>9/15/2012</td>
							<td>Even crazier</td>
							<td><a href="">delete</a>, <a href="">edit</a>, <a href="">mastered</a></td>
						</tr>
					</tbody>
				</table>
			</div>

<?php include "footer.php" ?>
