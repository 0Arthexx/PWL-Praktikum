<?php

function addNewGenre($newName): int
{
    $result = 10;
    $link = createMySqlConnection();
    $link -> beginTransaction();
    $query = 'INSERT INTO genre(name) VALUES (?)';
}