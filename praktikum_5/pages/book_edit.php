<?php
$editedIsbn = filter_input(INPUT_GET, 'bisbn');
if (isset($editedIsbn)) {
    $book = fetchOneBook($editedIsbn);
    $genreName = fetchOneGenreName($editedIsbn);
}

$updatePressed = filter_input(INPUT_POST, 'btnUpdate');
if (isset($updatePressed)) {
    $isbn = filter_input(INPUT_POST, 'txtISBN');
    $title = filter_input(INPUT_POST, 'txtTittle');
    $author = filter_input(INPUT_POST, 'txtAuthor');
    $publisher = filter_input(INPUT_POST, 'txtPublisher');
    $publisheryear = filter_input(INPUT_POST, 'txtPublisherYear');
    $shortdesc = filter_input(INPUT_POST, 'txtShortDescription');
    $genrename = filter_input(INPUT_POST, 'genreName');

    if (trim($isbn) == ' ' || trim($title) == ' ' || trim($author) == ' ' || trim($publisher) == ' ' || trim($publisheryear) == ' ' || trim($shortdesc) == ' ' || trim($genrename) == ' ') {
        echo '<div> Please Provid with a valid name </div>';
    } else {
        $result = updateBookToDb($book['isbn'], $title, $author, $publisher, $publisheryear, $shortdesc, $genrename);
        if ($result) {
            header('location:index.php?menu=book');
        } else {
            echo '<div>Failed to update data</div>';
        }
    }
}
?>

<div class="container">
    <form method="post">

        <div class="row mt-2">
            <label for="txtISBN" class="col-sm-3 col-form-label">
                <h6>BOOK ISBN</h6>
            </label>
            <div class="">
                <input type="text" name="txtISBN" id="txtISBN" class="form-control" value="<?php echo $book['isbn'];?>" readonly>
            </div>
        </div>

        <div class="row mt-2">
            <label for="txtTittle" class="col-sm-3 col-form-label">
                <h6>BOOK TITTLE</h6>
            </label>
            <div class="">
                <input type="text" maxlength="45" placeholder="Book Tittle" required autofocus name="txtTittle" id="txtTittle" class="form-control" value="<?php echo $book['title'];?>">
            </div>
        </div>

        <div class="row mt-2">
            <label for="txtAuthor" class="col-sm-3 col-form-label">
                <h6>AUTHOR</h6>
            </label>
            <div class="">
                <input type="text" maxlength="45" placeholder="Book Author" required autofocus name="txtAuthor" id="txtAuthor" class="form-control" value="<?php echo $book['author'];?>">
            </div>
        </div>

        <div class="row mt-2">
            <label for="txtPublisher" class="col-sm-3 col-form-label">
                <h6>PUBLISHER</h6>
            </label>
            <div class="">
                <input type="text" maxlength="45" placeholder="Book Publisher" required autofocus name="txtPublisher" id="txtPublisher" class="form-control" value="<?php echo $book['publisher'];?>">
            </div>
        </div>

        <div class="row mt-2">
            <label for="txtPublisherYear" class="col-sm-3 col-form-label">
                <h6>PUBLISHER YEAR</h6>
            </label>
            <div class="">
                <input type="text" maxlength="45" placeholder="Book Publihser Year" required autofocus name="txtPublisherYear" id="txtPublisherYear" class="form-control" value="<?php echo $book['publisher_year'];?>">
            </div>
        </div>

        <div class="row mt-2">
            <label for="txtShortDescription" class="col-sm-3 col-form-label">
                <h6>SHORT DESCRIPTION</h6>
            </label>
            <div class="">
                <textarea name="txtShortDescription" id="txtShortDescription" cols="50" rows="3" class="form-control" required autofocus><?php echo $book['short_description'];?></textarea>
            </div>
        </div>

        <div class="row mt-2">
            <label for="genreName" class="col-sm-3 col-form-label">
                <h6>GENRE NAME</h6>
            </label>
            <div class="">
                <select required autofocus name="genreName" id="genreName">
                    <option value="<?php echo $book['genre_id']; ?>" selected><?php echo $genreName['name']; ?></option>
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
            <input type="submit" value="Update Data" name="btnUpdate" class="btn btn-primary">
        </div>

    </form>
</div>
