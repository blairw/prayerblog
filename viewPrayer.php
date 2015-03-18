<!DOCTYPE html>
<html>
	<head>
		<title>PrayerViewer</title>
		<meta charset="utf-8">
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--jquery-->
		<script src="frameworks/jquery-1.11.2.min.js"></script>
		<!--bootstrap-->
		<script src="frameworks/bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="frameworks/bootstrap-3.3.2-dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="frameworks/bootstrap-3.3.2-dist/css/bootstrap-theme.min.css" />
		<!--font-awesome-->
		<link rel="stylesheet" href="frameworks/font-awesome-4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="common.css" />
		<script>
			<?php
				if (isset($_GET['id']) && isset($_GET['uuid'])) {
					echo 'var getId = '.$_GET['id'].";\n";
					echo 'var getUuid = "'.$_GET['uuid']."\";\n";
				}
			?>
			function bodyDidLoad() {
				$.get("db-getPrayerByUuid.php?id="+getId+"&uuid="+getUuid, function(ajaxResponse) {
					$("#prayer_title").html(ajaxResponse.prayer_title);
					$("#prayer_text").html(ajaxResponse.prayer_text);
					$("#create_ts").html(ajaxResponse.create_ts);
					if (ajaxResponse.is_public == 1) {
						$("#is_public").html(
							"<i class='fa fa-check-square'></i>&nbsp;&nbsp;"
							+"Public Prayer"
						);
						$("#is_public").toggleClass("prayerPublic");
					} else {
						$("#is_public").html(
							"<i class='fa fa-exclamation-triangle'></i>&nbsp;&nbsp;"
							+"Private Prayer"
						);
						$("#is_public").toggleClass("prayerPrivate");
					}
				});
			}
			function viewPublicPrayers() {
				document.location = './';
			}
		</script>
	</head>
	<body onload="bodyDidLoad()">
		<div class="prayerblogWrapper">
			<button class="btn btn-sm btn-success" onclick="viewPublicPrayers()">
				<i class="fa fa-mail-reply"></i>&nbsp;&nbsp;View All Public Prayers
			</button>
			<div class="forceCenter">
				<h2 id="prayer_title" class="prayer_title"></h2>
				<p><span id="is_public" class="is_public"></span>&nbsp;<span id="create_ts" class="create_ts"></span></p>
				<p id="prayer_text" class="prayer_text"></p>
			</div>
		</div>
	</body>
</html>
