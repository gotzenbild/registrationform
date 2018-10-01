<?php
// Проверяет на ввод допустимых символов 
function check($value)
{
    $len = strlen($value);
    if ($len < 5 ){return false;}
    if (!preg_match("/^[a-z0-9][a-z0-9-_]+[a-z0-9]$/i", $value)){ return false;}   
    foreach (["--", "__", "-_", "_-"] as $v){
        if (strpos($value, $v)){return false;}
    }   
    return true;
}
?>