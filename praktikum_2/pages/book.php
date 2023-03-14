<?php
$deleteCommand = filter_input(INPUT_GET, 'cmd');
if (isset($deleteCommand) && $deleteCommand == 'del') {
    $bookIsbn = filter_input(INPUT_GET, 'bisbn');
    $result = deleteBookFromDb($bookIsbn);
    if ($result) {
        echo '<div>Data successfully removed</div>';
    } else {
        echo '<div>Failed to remove data</div>';
    }
}

$submitPressed = filter_input(INPUT_POST, 'btnSave');
if (isset($submitPressed)) {
    $isbn = filter_input(INPUT_POST, 'txtISBN');
    $title = filter_input(INPUT_POST, 'txtTittle');
    $author = filter_input(INPUT_POST, 'txtAuthor');
    $publisher = filter_input(INPUT_POST, 'txtPublisher');
    $publisheryear = filter_input(INPUT_POST, 'txtPublisherYear');
    $shortdesc = filter_input(INPUT_POST, 'txtShortDescription');
    $genrename = filter_input(INPUT_POST, 'genreName');

    if (trim($isbn) == '' || trim($title) == '' || trim($author) == '' || trim($publisher) == '' || trim($publisheryear) == '' || trim($shortdesc) == '' || trim($genrename) == ''){
        echo '<div> Please Provid with a valid name </div>';
    } else {
        $results = addNewBook($isbn, $title, $author, $publisher, $publisheryear, $shortdesc, $genrename);
        if ($results) {
            echo '<div>Data sucefully added</div>';
        } else {
            echo '<div>Failed to add data</div>';
        }
    }
}
?>

<style>
    tr {
        background-color: #FFDD59;
    }
</style>

<div class="container">
    <form method="post">

        <div class="row mt-2">
            <label for="txtISBN" class="col-sm-3 col-form-label">
                <h6>BOOK ISBN</h6>
            </label>
            <div class="">
                <input type="text" maxlength="45" placeholder="Book ISBN" required autofocus name="txtISBN" id="txtISBN" class="form-control">
            </div>
        </div>

        <div class="row mt-2">
            <label for="txtTittle" class="col-sm-3 col-form-label">
                <h6>BOOK TITTLE</h6>
            </label>
            <div class="">
                <input type="text" maxlength="45" placeholder="Book Tittle" required autofocus name="txtTittle" id="txtTittle" class="form-control">
            </div>
        </div>

        <div class="row mt-2">
            <label for="txtAuthor" class="col-sm-3 col-form-label">
                <h6>AUTHOR</h6>
            </label>
            <div class="">
                <input type="text" maxlength="45" placeholder="Book Author" required autofocus name="txtAuthor" id="txtAuthor" class="form-control">
            </div>
        </div>

        <div class="row mt-2">
            <label for="txtPublisher" class="col-sm-3 col-form-label">
                <h6>PUBLISHER</h6>
            </label>
            <div class="">
                <input type="text" maxlength="45" placeholder="Book Publisher" required autofocus name="txtPublisher" id="txtPublisher" class="form-control">
            </div>
        </div>

        <div class="row mt-2">
            <label for="txtPublisherYear" class="col-sm-3 col-form-label">
                <h6>PUBLISHER YEAR</h6>
            </label>
            <div class="">
                <input type="text" maxlength="45" placeholder="Book Publihser Year" required autofocus name="txtPublisherYear" id="txtPublisherYear" class="form-control">
            </div>
        </div>

        <div class="row mt-2">
            <label for="txtShortDescription" class="col-sm-3 col-form-label">
                <h6>SHORT DESCRIPTION</h6>
            </label>
            <div class="">
                <textarea name="txtShortDescription" id="txtShortDescription" cols="50" rows="3" class="form-control" required autofocus></textarea>
            </div>
        </div>

        <div class="row mt-2">
            <label for="genreName" class="col-sm-3 col-form-label">
                <h6>GENRE NAME</h6>
            </label>
            <div class="">
                <select required autofocus name="genreName" id="genreName">
                    <option value="">--Select your Genre--</option>
                    <?php
                    $resultgenre = fetchGenreFromDb();
                    foreach ($resultgenre as $genre) {
                        echo '<option value="' . $genre['id'] . '">' .$genre['name'].'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row mt-4">
            <input type="submit" value="Save Data" name="btnSave" class="btn btn-primary">
        </div>

    </form>
</div>

<div class="container mt-5 ">
    <table class="table mt-3 text-center" id="table">
        <thead>
        <tr>
            <th class="text-center">ISBN</th>
            <th class="text-center">Title</th>
            <th class="text-center">Author</th>
            <th class="text-center">Publisher</th>
            <th class="text-center">Publisher Year</th>
            <th class="text-center">Short Description</th>
            <th class="text-center">Genre Name</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $results = fetchBookFromDb();
        foreach ($results as $book) {
            echo '<tr>';
            echo '<td>' . $book['isbn'] . '</td>';
            echo '<td>' . $book['title'] . '</td>';
            echo '<td>' . $book['author'] . '</td>';
            echo '<td>' . $book['publisher'] . '</td>';
            echo '<td>' . $book['publisher_year'] . '</td>';
            echo '<td>' . $book['short_description'] . '</td>';
            echo '<td>' . $book['name'] . '</td>';
            echo '<td>
<button onclick="editBook(\'' . $book['isbn'] . '\')" class="btn btn-warning mb-2">Edit Book</button>
<button onclick="deleteBook(\'' . $book['isbn'] . '\')" class="btn btn-danger">Delete Book</button>
</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<script src="js/book_index.js">

</script>