<?php
$deletecmd = filter_input(INPUT_GET,'comd');
if(isset($deletecmd) && $deletecmd = 'dele'){
    $ISBNdel = filter_input(INPUT_GET,'idb');
    $book=fetchOneBook($ISBNdel);
    unlink('uploads/'.$book['cover']);
    $results =deleteBookFromDb($ISBNdel);
    if($results){
        echo '<div>Data successfully removed</div>';
    }else{
        echo '<div>Failed to remove data</div>';

    }
}

$submitPressed = filter_input(INPUT_POST,'btnSave');
if(isset($submitPressed)){
    $ISBN = filter_input(INPUT_POST,'ISBN');
    $title = filter_input(INPUT_POST,'title');
    $author = filter_input(INPUT_POST,'author');
    $publisher = filter_input(INPUT_POST,'publisher');
    $yearPublished = filter_input(INPUT_POST,'yearPublished');
    $shortDesc = filter_input(INPUT_POST,'shortDesc');
    $cover = filter_input(INPUT_POST,'cover');
    $idGenre = filter_input(INPUT_POST,'idGenre');
    if(trim($ISBN) == ''||trim($title) == ''||trim($author) == ''||trim($publisher) == ''||trim($shortDesc) == ''||trim($idGenre) == ''){
        echo `
        <div class="text-center">
            Please provide with a valid name
        </div>
        `;
    }else{
        $results = addNewBook($ISBN,$title,$author,$publisher,$yearPublished,$shortDesc,$idGenre);
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
            <label for="ISBNNum" class="form-label">ISBN</label>

            <div class="">
                <input type="text" class="form-control" name="ISBN" id="ISBNNum" maxlength="13" required autofocus placeholder="ISBN">
            </div>
        </div>

        <div class="row mt-2">
            <label for="bookTitle" class="form-label">Title</label>

            <div class="">
                <input type="text" class="form-control" name="title" id="bookTitle" maxlength="100" required autofocus placeholder="Title">
            </div>
        </div>

        <div class="row mt-2">
            <label for="authorBook" class="form-label">Author</label>

            <div class="">
                <input type="text" class="form-control" name="author" id="authorBook" maxlength="100" required autofocus placeholder="Author">
            </div>
        </div>

        <div class="row mt-2">
            <label for="bookPublisher" class="form-label">Publisher</label>
            <div class="">
                <input type="text" class="form-control" name="publisher" id="bookPublisher" maxlength="100" required autofocus placeholder="Publisher">
            </div>
        </div>

        <div class="row mt-2">
            <label for="pubYear" class="form-label">Year Published</label>
            <div class="">
                <input type="number" class="form-control" name="yearPublished" id="pubYear"  required autofocus placeholder="Year Published">
            </div>
        </div>

        <div class="row mt-2">
            <label for="shortDesc" class="form-label">Short Description</label>
            <div class="">
                <textarea  rows="4" type="textarea" class="form-control" name="shortDesc" id="shortDesc" maxlength="300" required autofocus placeholder="Short Description" >
                </textarea>
            </div>
        </div>

        <div class="row mt-2">
            <label for="cover" class="form-label">Cover</label>
            <div class="">
                <input type="text" class="form-control" name="cover" id="cover" maxlength="100"  autofocus placeholder="Cover">
            </div>
        </div>

        <div class="row mt-2">
            <label for="IDgenre" class="form-label">Genre Name</label>
            <div class="">
                <select class="form-select" name="idGenre" aria-label="Default select example">
                    <option value="" selected> --Select your Genre-- </option>
                    <?php
                    $resultgenre = fetchGenreFromDb();
                    foreach ($resultgenre as $genre) {
                        echo '<option value="' . $genre['id'] . '">' .$genre['name'].'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary w-100" name="btnSave">Save Data</button>

        </div>

    </form>
</div>

<div class="container mt-5 ">
    <table class="table mt-3 text-center" id="table">
        <thead>
        <tr>
            <th class="text-center">Cover</th>
            <th class="text-center">ISBN</th>
            <th class="text-center">Title</th>
            <th class="text-center">Author</th>
            <th class="text-center">Publisher</th>
            <th class="text-center">Year Published</th>
            <th class="text-center">Short Description</th>
            <th class="text-center">Genre Name</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $results = fetchJoinFromDb();
        foreach ($results as $book) {
            echo '<tr>';
            if ($book['cover'] != '') {
                echo '<td class="py-2 px-2"> <img class="rounded-3" src="uploads/'.$book['cover'].'" style="width:100%;height:auto;max-width:500px;max-height:500px;"></td>';
            }
            else {
                echo '<td class="py-2 px-2"> <img class="rounded-3" src="src/soon.jpg" style="width:100%;height:auto;max-width:500px;max-height:500px;"></td>';
            }
            echo '<td>'. $book['isbn'] . '</td>';
            echo '<td >'. $book['title'] . '</td>';
            echo '<td>'. $book['author'] . '</td>';
            echo '<td>'. $book['publisher'] . '</td>';
            echo '<td>'. $book['publish_year'] . '</td>';
            echo '<td>' . $book['short_description'] . '</td>';
            echo '<td>' . $book['name'] . '</td>';
            echo '<td>
                <button onclick="editCover(\'' . $book['isbn'] . '\')" class="btn btn-success m-2">Change Cover</button>
                <button onclick="editBook(\'' . $book['isbn'] . '\')" class="btn btn-warning m-2">Edit Book</button>
                <button onclick="deleteBook(\'' . $book['isbn'] . '\')" class="btn btn-danger m-2">Delete Book</button>
                </td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<script src="js/book_index.js"></script>