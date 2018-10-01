<?php
    session_start();
    if(empty($_SESSION["login"]))
    echo("<script>location.href='index.html';</script>");
?>
<!DOCTYPE html>
<html >
<head>
    <title>Web site</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">     

    <link rel="stylesheet" type="text/css" href="css/profilcss.css">
    
</head>
<body>
 <div id= "header" >
    <div id = "logo"  >
        <h1 ><b>Тест</b></h1>
    </div>
    <div id = "exit" >
        <h1 ><b><a href="exit.php" class = "exita">Выход</a></b></h1>
    </div>
 </div>
 

<div id="content" >
    <br>
    <?php
    // Выводит информацию авторизированого пользователя  
    include ("db/dbopen.php");
    $login= $_SESSION['login'];
    $rows = "SELECT * FROM users WHERE login = '$login'" ; 
    $prof = mysql_fetch_array(mysql_query($rows));
    
    echo ('<font class = "prof"> Логин :  '.$prof["login"].'</font><br><br>');
    echo ('<font class = "prof"> Имя :  '.$prof["name"].'</font> <br><br>');
    echo ('<font class = "prof"> Фамилия :  '.$prof["surname"].'</font><br><br>');
    echo ('<font class = "prof"> E-mail :  '.$prof["e-mail"].' </font><br><br>');
    ?>
        
</div> 
<script src = "jquery/jquery-3.3.1.min.js"></script>\

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>