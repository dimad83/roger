<?php include_once 'config.php'; ?>
<html>
<head>
	<title>My site</title>
</head>
<body>

<?php if(AUTH) {
	echo "Привет, {$user['name']}! <a href='login.php?logout'>Выход</a>";
} else {
	echo $_SESSION['message'] ? "<span style='color: red'>{$_SESSION['message']}</span><br>" : "";
	?>
	<form action="login.php" method="post">
		<p>Имя пользователя: <input type="text" name="login" /></p>
		<p>Пароль: <input type="password" name="password" /></p>
		<p>Запомнить меня: <input type="checkbox" name="remember" /></p>
		<?php if(!empty($message)) { ?>
			<p><?php echo $message; ?></p>
		<?php } ?>
		<p><input type="submit" value="Вход" /></p>
	</form>
<?php } ?>

</body>
</html>