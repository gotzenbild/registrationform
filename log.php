<?php
session_start();
if (isset($_REQUEST['log'])) { $login = $_REQUEST['log']; if ($login == '') { unset($login);} } 
if (isset($_REQUEST['pass'])) { $pass=$_REQUEST['pass']; if ($pass =='') { unset($pass);} }
if (empty($login) or empty($pass)){echo "| Не все поля заполнены |";}
else {
	// Удаляет пробелы , экранирование символов, NULL-байты, HTML- и PHP-теги
	include ("validity/validity.php");
	$login = clean($login);
	$pass = clean($pass);
	if (empty($login) or empty($pass)){echo "| Введены недопустимые символы |";}
	else {
	// Проверяет наличие пары логин-пароль
	include ("db/dbopen.php");
	$result =mysql_query("SELECT * FROM users WHERE login='$login'",$db);
	$myrow = mysql_fetch_array($result);
	if (empty($myrow['password'])){echo "| Неверный логин или пароль |";}
	else {
		if ($myrow['password']==$pass) {
			$_SESSION['login']=$myrow['login']; 
			$_SESSION['id']=$myrow['id'];
			echo "| Авторизация |",("<script>location.href='profil.php';</script>");
		}
		else {echo "| Ошибка сервера |";}
		}
	}
}
?>