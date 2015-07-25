<?php
	session_start();
	if (!$_SESSION['verified']) {
		header("Location: ui-login.php");
	}
	
	// connect to mysql
	include ('../prayerblog-db/db-MysqlAccess.php');
	
	$res = $mysqli->query("
		SELECT * FROM prayerblog
		ORDER BY create_ts DESC
	");
	
	$arr = array();
	while ($row = $res->fetch_assoc()) {
		array_push($arr, $row);
	}
	$res->close();
	$mysqli->close();
?>
<h1>prayerblog admin panel</h1>
<table>
	<tbody>
<?php
	for ($i = 0; $i < count($arr); $i++) {
		echo '<tr>';
		echo '<td>'.$arr[$i]['prayer_id'].'</td>';
		echo '<td>'.$arr[$i]['prayer_uuid'].'</td>';
		echo '<td>'.$arr[$i]['prayer_title'].'</td>';
		echo '<td>'.$arr[$i]['prayer_text'].'</td>';
		echo '<td>'.$arr[$i]['create_ts'].'</td>';
		echo '<td>'.$arr[$i]['is_public'].'</td>';
		echo '</tr>';
	}
?>
	</tbody>
</table>

<h2>New prayer</h2>
<form method="post" action="db-newPrayer.php">
	<input name="myTitle" type="text" placeholder="title"></input>
	<br />
	<textarea name="myContent" type="text" placeholder="content"></textarea>
	<br />
	<input name="myPublicPrivate" type="checkbox"></input>public
	<br />
	<button type="submit">go</button>
</form>
