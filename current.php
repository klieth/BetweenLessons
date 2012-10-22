<html>
	<head>
		<title>Between Lessons</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="Song.js"></script>

		<script type="text/javascript" src="FillTable.js"></script>

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
					<tbody id="SongInfo">
					</tbody>
				</table>
			</div>

<?php include "footer.php" ?>
