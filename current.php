<?php include 'songHeader.php' ?>
	<script src="current.js" type="text/javascript"></script>
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
			<div id="test"></div>
			<div id="error"></div>
			<?php include "addSong.php"?>
		</div>

<?php include "footer.php" ?>
