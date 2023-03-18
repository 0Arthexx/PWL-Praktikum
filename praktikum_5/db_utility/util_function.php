<?php
function createMySqlConnection()
{
    $link = new PDO('mysql:host=localhost;dbname=pwl2022', 'root', 'Jalankatunen01*');
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    return $link;
}
?>