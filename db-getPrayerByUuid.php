<?php
	if (isset($_GET['id']) && isset($_GET['uuid'])) {
		$getId = $_GET['id'];
		$getUuid = $_GET['uuid'];
		
		// connect to mysql
		include ('../prayerblog-db/db-MysqlAccess.php');
		
		
		$stmt = $mysqli->prepare("
			SELECT prayer_id, prayer_uuid, prayer_title, prayer_text, create_ts, is_public
			FROM prayerblog
			WHERE prayer_id = ? AND prayer_uuid = ?
		");
		$stmt->bind_param("is", $getId, $getUuid);
		$stmt->execute();
		$stmt->bind_result(
			$arr['prayer_id'], $arr['prayer_uuid'], 
			$arr['prayer_title'],
			$arr['prayer_text'],
			$arr['create_ts'], $arr['is_public']
		);
		$stmt->fetch();
		
		$stmt->close();
		$mysqli->close();
		
		header('Content-type: application/json');
		echo json_encode($arr, JSON_PRETTY_PRINT);
	}
?>
