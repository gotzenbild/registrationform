<?php
// Удаляет пробелы , экранирование символов, NULL-байты, HTML- и PHP-теги
function clean($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}
?>