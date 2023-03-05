<?php
$link = new PDO('mysql:host=localhost;dbname=pwl2022', 'root', '');
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
$query = 'SELECT isbn, title, author, publisher, publisher_year, genre_id FROM book';
$stmt = $link->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll();
$link = null;
?>
<style>
    tr {
        background-color: #FFDD59;
    }
</style>

<div class="container mt-5 ">
    <table class="table mt-3 text-center" id="table">
        <thead>
        <tr>
            <th class="text-center">ISBN</th>
            <th class="text-center">Title</th>
            <th class="text-center">Author</th>
            <th class="text-center">Publisher</th>
            <th class="text-center">Publisher Year</th>
            <th class="text-center">Genre ID</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $book) {
            echo '<tr>';
            echo '<td>' . $book['isbn'] . '</td>';
            echo '<td>' . $book['title'] . '</td>';
            echo '<td>' . $book['author'] . '</td>';
            echo '<td>' . $book['publisher'] . '</td>';
            echo '<td>' . $book['publisher_year'] . '</td>';
            echo '<td>' . $book['genre_id'] . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>