<?php 
    function fetchJoinFromDb(){
        $link = createMySQLConnection();
        $query = 'SELECT b.isbn, b.cover, b.title, b.author, b.publisher, b.year_published, b.short_description, g.name FROM book b JOIN genre g ON b.genre_id = g.id';
        $stmt = $link->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $link = null;
        return $results;
    }
    function fetchBookFromDb(){
        $link = createMySQLConnection();
        $query = "SELECT id,name FROM genre WHERE id = ?";
        $stmt = $link->prepare($query);
        $stmt->execute();
        $result2 = $stmt->fetchAll();
        $link =null;
        return $result2;
    }
    function fetchBook2FromDb($editedISBN){
        $link = createMySQLConnection();
        $query = "SELECT * FROM genre WHERE ";
        $stmt = $link->prepare($query);
        $stmt->execute();
        $result2 = $stmt->fetchAll();
        $link =null;
        return $result2;
    }
    function fetchOneBook($isbn){
        $link = createMySQLConnection();
        $query = "SELECT ISBN,cover,title,author,publisher,year_published,short_description,genre_id  FROM book WHERE ISBN = ?;";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$isbn);
        $stmt->execute();
        $result = $stmt->fetch();
        $link =null;
        return $result;
    }
    function fetchJoinFromDb2(){
        $link = createMySQLConnection();
        $query = "SELECT ISBN,cover,title,author,publisher,year_published,genre.name AS 'nama_genre' FROM book INNER JOIN genre WHERE book.genre_id = genre.id AND ISBN = ?;";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$isbna);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $link =null;
        return $result;
    }
    function fetchOneBook2(){
        $link = createMySQLConnection();
        $query = "SELECT COUNT(ISBN) as Total FROM book ";
        $stmt = $link->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $link =null;
        return $result;
    }
    function addNewBook($newISBN,$newTitle,$newAuthor,$newPublisher,$newYearPublished,$newShortDescription,$newGenreId): int{
        $result = 0;
        $link = createMySQLConnection();
        $link -> beginTransaction();
        $query = 'INSERT INTO book(ISBN,title,author,publisher,year_published,short_description,genre_id) VALUES (?,?,?,?,?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$newISBN,PDO::PARAM_STR);
        $stmt->bindParam(2,$newTitle,PDO::PARAM_STR);
        $stmt->bindParam(3,$newAuthor,PDO::PARAM_STR);
        $stmt->bindParam(4,$newPublisher,PDO::PARAM_STR);
        $stmt->bindParam(5,$newYearPublished,PDO::PARAM_INT);
        $stmt->bindParam(6,$newShortDescription,PDO::PARAM_STR);
        $stmt->bindParam(7,$newGenreId,PDO::PARAM_INT);
        if($stmt->execute()){
            $link -> commit();
            $result = 1;
        }else{
            $link -> rollBack();
        }
        $link =null;
        return $result;
    }
    function updateBookToDb($ISBN,$newTitle,$newAuthor,$newPublisher,$newYearPublished,$newShortDescription,$newGenreId){
        $result = 0;
        $link = createMySQLConnection();
        $link -> beginTransaction();
        $query = 'UPDATE book SET title = ?,author = ?,publisher = ?,year_published = ?,short_description = ?,genre_id = ? WHERE ISBN = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$newTitle,PDO::PARAM_STR);
        $stmt->bindParam(2,$newAuthor,PDO::PARAM_STR);
        $stmt->bindParam(3,$newPublisher,PDO::PARAM_STR);
        $stmt->bindParam(4,$newYearPublished,PDO::PARAM_INT);
        $stmt->bindParam(5,$newShortDescription,PDO::PARAM_STR);
        $stmt->bindParam(6,$newGenreId,PDO::PARAM_INT);
        $stmt->bindParam(7,$ISBN,PDO::PARAM_STR);
        if($stmt->execute()){
            $link -> commit();
            $result = 1;
        }else{
            $link -> rollBack();
        }
        $link =null;
        return $result;
    }
    
    function updateCoverToDb($isbn, $cover){
        $result = 0;
        $link = createMySQLConnection();
        $link -> beginTransaction();
        $query = 'UPDATE book SET cover= ? WHERE ISBN = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$cover,PDO::PARAM_STR);
        $stmt->bindParam(2,$isbn,PDO::PARAM_STR);
        if($stmt->execute()){
            $link -> commit();
            $result = 1;
        }else{
            $link -> rollBack();
        }
        $link =null;
        return $result;
    }


    function deleteBookFromDb($isbn){
        $result = 0;
        $link = createMySQLConnection();
        $link->beginTransaction();
        $query = 'DELETE FROM book WHERE ISBN = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1,$isbn);
        if($stmt->execute()){
            $link -> commit();
            $result = 1;
        }else{
            $link -> rollBack();
        }
        $link =null;
        return $result;
    }
?>