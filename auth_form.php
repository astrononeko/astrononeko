<form action="auth_form.php" method="get">
	<input type="text" name="login" placeholder="Login" /><br />
	<input type="password" name="password" placeholder="Password" /><br />
	<input type="submit" name="login_try" value="Log in">
</form>
<?php

if (isset($_REQUEST['login_try'])) {
	echo $_SERVER['QUERY_STRING'];
}

?>