<?php
	session_start();
	if (!$_SESSION['verified']) {
		header("Location: ui-login.php");
	}
	include ('db-generateUuid.php');
	
	// connect to mysql
	include ('../prayerblog-db/db-MysqlAccess.php');
	
	if ($_POST['myPublicPrivate'] == "on") {
		$isPublic = 1;
	} else {
		$isPublic = 0;
	}
	
	// We want to UPDATE the staff account
	if (!($smt = $mysqli->prepare(
		"INSERT INTO prayerblog (prayer_uuid, prayer_title, prayer_text, is_public) VALUES (?, ?, ?, ?)"
	))) { 
		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	if (!$smt->bind_param(
		"sssi", 
		guid(), $_POST['myTitle'], $_POST['myContent'], $isPublic
	)) {
		echo "Binding parameters failed: (" . $smt->errno . ") " . $smt->error;
	}
	if (!($smt->execute())) {
		echo "Execute failed: (" . $smt->errno . ") " . $smt->error;
	};

	$mysqli->close();
?>
