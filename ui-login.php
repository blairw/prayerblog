<style>
	button, input {
		font-size: 200%;
	}
	button {
		background-color: rgba(0,101,189,0.2);
		border: 1px solid rgba(0,101,189,0.5);
		border-bottom: 2px solid rgb(0,101,189);
	}
	button:hover {
		background-color: rgba(0,101,189,0.5);
		border-bottom: 4px solid rgb(0,101,189);
	}
	.centered {
		text-align: center;
		padding: 10pt;
	}
</style>
<script>
</script>
<form class="centered" action="db-login.php" method="post">
	<h1>prayerblog</h1>
	<input name="myPassword" type="password" placeholder="password"></input>
	<button>login</button>
</form>
