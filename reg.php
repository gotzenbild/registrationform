<?php
session_start();
if (isset($_REQUEST['logr'])) { $logr= $_REQUEST['logr']; if ($logr == '') { unset($logr);} }
if (isset($_REQUEST['passr'])) { $passr=$_REQUEST['passr']; if ($passr =='') { unset($passr);} }
if (isset($_REQUEST['passrc'])) { $passrc=$_REQUEST['passrc']; if ($passrc =='') { unset($passrc);} }
if (isset($_REQUEST['namer'])) { $namer=$_REQUEST['namer']; if ($namer=='') { unset($namer);} }
if (isset($_REQUEST['surr'])) { $surr=$_REQUEST['surr']; if ($surr =='') { unset($surr);} }
if (isset($_REQUEST['mailr'])) { $mailr=$_REQUEST['mailr']; if ($mailr =='') { unset($mailr);} }


if (empty($logr) or empty($passr) or empty($passrc) or empty($namer)or empty($surr)or empty($mailr)){echo "| Не все поля заполнены |";}
else{
    // Проверка валидности логина 
    include ("validity/validityforreg.php"); 
    if (!($f = check($logr))){echo "| Логин должен состоять из  не мение 5 символов , и содержать только цифры и латинские буквы |";}
    else {
        // Проверка на уникальность логина
        include('db/dbopen.php');
        $result = mysql_query("SELECT id FROM users WHERE login='$logr'",$db);
        $myrow = mysql_fetch_array($result);
        if (!empty($myrow['id'])) {echo "| Логин занят |";}
        else {
            //Проверка валидности пароля
            if (!check($passr)){echo "| Пароль должен состоять из  не мение 5 символов , и содержать только цифры и латинские буквы |";}
            else{
                if (!($passrc == $passr )) {echo "| Пароли не совпадают |" ,$passr, $passrc;}
                else{
                    // Удаляет пробелы , экранирование символов, NULL-байты, HTML- и PHP-теги
                    include ("validity/validity.php");
                    $logr = clean($logr);
                    $passr= clean($passr);
                    $namer = clean($namer);
                    $surr = clean($surr);
                    $mailr = clean($mailr);
                    if (empty($logr) or empty($passr) or empty($namer)or empty($surr)or empty($mailr)){echo "| Введены недопустимые символы |";}
                    else{
                        // Записывает юзера в бд
                        $result2 = mysql_query("INSERT INTO users (`login`,`password`,`e-mail`,`name`,`surname`) VALUES('$logr','$passr','$mailr','$namer','$surr')");
                        $result = mysql_query("SELECT id FROM users WHERE login='$logr'",$db);
                        $myrow = mysql_fetch_array($result);
                        if ($result2=='TRUE'){
                            $_SESSION['login']=$logr;
                            $_SESSION['id']=$myrow['id'];
                            echo $_SESSION['id']."| Авторизация |",("<script>location.href='profil.php'</script>");
                            }   
                        else{echo "| Ошибка сервера |";}
                    }
                }
            }
        }
   }
}
?>