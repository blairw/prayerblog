<?php
	// connect to mysql
	include ('../prayerblog-db/db-MysqlAccess.php');
	
	$res = $mysqli->query("
		SELECT config_value FROM prayerblog_config WHERE config_name = 'password'
	");
	
	$myPassword = null;
	while ($row = $res->fetch_assoc()) {
		$myPassword = $row['config_value'];
	}
	$res->close();
	$mysqli->close();
	
	if ($myPassword != null && $myPassword == $_POST['myPassword']) {
		session_start();
		$_SESSION['verified'] = true;
		header('Location: ui-adminPanel.php');
	} else {
		header('Location: ui-login.php');
	}
?>

