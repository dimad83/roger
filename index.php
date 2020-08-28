<?php include_once 'config.php'; ?>
<html>
<head>
	<title>My site</title>
</head>
<body>

<?php if(AUTH) {
	echo "Привет, {$user['name']}! <a href='login.php?logout'>Выход</a>";
} else { ?>
	<form action="login.php" method="post">
		<p>Имя пользователя: <input type="text" name="login" /></p>
		<p>Пароль: <input type="password" name="password" /></p>
		<p>Запомнить меня: <input type="checkbox" name="remember" /></p>
		<?php if(!empty($message)) {
			echo "<p style='color: red'>$message</p>";
		} ?>
		<p><input type="submit" value="Вход" /></p>
	</form>
<?php } ?>

</body>
</html>