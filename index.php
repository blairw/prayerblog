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
			function bodyDidLoad() {
				$.get("db-getPublicPrayers.php", function(ajaxResponse) {
					for (i=0;i<ajaxResponse.length;i++) {
						$("#prayerOutput").append(
							'<div class="prayerSegment">'
							+'<a href="viewPrayer.php?id='+ajaxResponse[i].prayer_id+'&uuid='+ajaxResponse[i].prayer_uuid+'">'
								+'<h2 class="prayer_title">'+ajaxResponse[i].prayer_title
								+'</h2>'
							+'</a>'
							+'<p><span class="create_ts">'+ajaxResponse[i].create_ts+'</span></p>'
							+'<p class="prayer_text">'+ajaxResponse[i].prayer_text+'</p>'
							+'</span></p>'
							+'</div>'
						);
					}
				});
			}
			function viewPublicPrayers() {
				document.location = 'viewPublicPrayers.php';
			}
		</script>
	</head>
	<body onload="bodyDidLoad()">
		<div class="prayerblogWrapper forceCenter" id="prayerblogWrapper">
			<h1>Public Prayers</h1>
			<p id="aboutBlogDescription">
				God is omniscient (all-knowing). He knows what we pray before we even pray it. He has access to every database, including this
				one :)
			</p>
			<div id="prayerOutput"></div>
			<p id="creditsText">
				A theological/technological experiment by <a href="http://www.blairwang.id.au/">Blair Wang</a>.
				Built on <a target="_blank" href="https://jquery.com/">jQuery</a>,
				<a target="_blank" href="http://getbootstrap.com/">Bootstrap</a>, and
				<a target="_blank" href="http://fortawesome.github.io/Font-Awesome/">Font Awesome</a>.
			</p>
		</div>
	</body>
</html>
