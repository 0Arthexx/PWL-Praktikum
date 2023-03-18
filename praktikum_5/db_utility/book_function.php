<?php
function fetchBookFromDb()
{
    $link = createMySQLConnection();
    $query = 'SELECT b.isbn, b.title, b.author, b.publisher, b.publisher_year, b.short_description, g.name FROM book b JOIN genre g ON b.genre_id = g.id';
    $stmt = $link->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll();
    $link = null;
    return $results;
}

function addNewBook($newIsbn, $newTittle, $newAuthor, $newPublisher, $newPublisherYear, $newDescription, $newGenre)
{
    $result = 0;
    $link = createMySQLConnection();
    $link->beginTransaction();
    $query = 'INSERT INTO book(isbn, title, author, publisher, publisher_year, short_description, genre_id) VALUES (?, ?, ?, ?, ?, ?, ?)';
    $stmt = $link->prepare($query);

    $stmt->bindParam(1, $newIsbn);
    $stmt->bindParam(2, $newTittle);
    $stmt->bindParam(3, $newAuthor);
    $stmt->bindParam(4, $newPublisher);
    $stmt->bindParam(5, $newPublisherYear);
    $stmt->bindParam(6, $newDescription);
    $stmt->bindParam(7, $newGenre);

    if ($stmt->execute()) {
        $link->commit();
        $result = 1;
    } else {
        $link->rollBack();
    }
    $link = null;
    return $result;
}

function fetchOneBook($isbn)
{
    $link = createMySQLConnection();
    $query = 'SELECT * FROM book WHERE isbn = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $isbn);
    $stmt->execute();
    $results = $stmt->fetch();
    $link = null;
    return $results;
}

function fetchOneGenreName($isbn)
{
    $link = createMySQLConnection();
    $query = 'SELECT genre.name FROM book INNER JOIN genre ON book.genre_id = genre.id WHERE isbn = ?';
    $stmt = $link -> prepare($query);
    $stmt -> bindParam(1, $isbn);
    $stmt->execute();
    $results = $stmt->fetch();
    $link = null;
    return $results;
}

function deleteBookFromDb($isbn)
{
    $result = 0;
    $link = createMySQLConnection();
    $link->beginTransaction();
    $query = 'DELETE FROM book WHERE isbn = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $isbn);
    if ($stmt->execute()) {
        $link->commit();
        $result = 1;
    } else {
        $link->rollBack();
    }
    $link = null;
    return $result;
}

function updateBookToDb($isbn, $newTitle, $newAuthor, $newPublisher, $newPublisherYear, $newDescription, $newGenre)
{
    $result = 0;
    $link = createMySQLConnection();
    $link->beginTransaction();
    $query = 'UPDATE book SET title = ?, author = ?, publisher = ?, publisher_year = ?, short_description = ?, genre_id = ? WHERE isbn = ?';
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $newTitle);
    $stmt->bindParam(2, $newAuthor);
    $stmt->bindParam(3, $newPublisher);
    $stmt->bindParam(4, $newPublisherYear);
    $stmt->bindParam(5, $newDescription);
    $stmt->bindParam(6, $newGenre);
    $stmt->bindParam(7, $isbn);
    if ($stmt->execute()) {
        $link->commit();
        $result = 1;
    } else {
        $link->rollBack();
    }
    $link = null;
    return $result;
}