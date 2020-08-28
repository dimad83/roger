<?php
header('Content-type: text/html;charset=utf-8');
session_start();

define('SALT', 'alk tkrjgodm nmh preaz'); //рандомная строка

function getPassword($password)
{
	echo md5($password.SALT);
	return md5($password.SALT);
}

$users = [
	//пароль = getPassword('gloriann')
	'login1' => array('password' => '7e19673511ddbce827bb7e142d98e6d0', 'name' => 'gloriann'),
	//пароль = getPassword('test')
	'login2' => array('password' => '789532c82a3f1a183832741318850c95', 'name' => 'test'),
];

if(!isset($_SESSION['user']) && isset($_COOKIE['login']) && isset($_COOKIE['password'])
	&& isset($users[$_COOKIE['login']]) && getPassword($users[$_COOKIE['login']]['password']) == $_COOKIE['password']) {
	//если нет сессии пользователя, но есть куки с пользовательским логином и паролем
	//проходим аторизацию
	$_SESSION['user'] = $_COOKIE['login'];
}

define('AUTH', isset($_SESSION['user']) && isset($users[$_SESSION['user']])); //флаг аторизованы мы или нет
$user = AUTH ? $users[$_SESSION['user']] : null;


$message = '';
if(!empty($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}