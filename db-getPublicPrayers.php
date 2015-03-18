<?php	
	// connect to mysql
	include ('../prayerblog-db/db-MysqlAccess.php');
	
	$res = $mysqli->query("
		SELECT * FROM prayerblog WHERE is_public = 1
		ORDER BY create_ts DESC
	");
	
	$arr = array();
	while ($row = $res->fetch_assoc()) {
		array_push($arr, $row);
	}
	$res->close();
	$mysqli->close();
	
	header('Content-type: application/json');
	echo json_encode($arr, JSON_PRETTY_PRINT);
?>

