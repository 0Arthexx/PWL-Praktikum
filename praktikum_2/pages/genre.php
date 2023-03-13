<?php
$deleteCommand = filter_input(INPUT_GET, 'cmd');
if (isset($deleteCommand) && $deleteCommand == 'del') {
    $genreId = filter_input(INPUT_GET, 'gid');
    $result = deleteGenreFromDb($genreId);
    if ($result) {
        echo '<div>Data successfully removed</div>';
    } else {
        echo '<div>Failed to remove data</div>';
    }
}

$submitPressed = filter_input(INPUT_POST, 'btnSave');
if (isset($submitPressed)) {
    $name = filter_input(INPUT_POST, 'txtName');
    if (trim($name) == '') {
        echo '<div>Please provide with a valid name</div>';
    } else {
        $results = addNewGenre($name);
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

<div class="container mt-5 ">

    <form method="post">
        <div class="row mt-2">
            <label for="txtName" class="col-sm-3 col-form-label">
                <h6>GENRE NAME</h6>
            </label>
            <div class="">
                <input type="text" maxlength="45" placeholder="Genre Name" required autofocus name="txtName" id="txtName" class="form-control">
            </div>
        </div>

        <div class="row mt-4 mb-5">
            <input type="submit" value="Save Data" name="btnSave" class="btn btn-primary">
        </div>
    </form>

    <table class="table mt-3 text-center" id="table">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $results = fetchGenreFromDb();
        foreach ($results as $genre) {
            echo '<tr>';
            echo '<td>' . $genre['id'] . '</td>';
            echo '<td>' . $genre['name'] . '</td>';
            echo '<td>
<button onclick="editGenre (' . $genre['id'] . ')" class="btn btn-warning">Edit Genre</button>
<button onclick="deleteGenre (' . $genre['id'] . ')" class="btn btn-danger">Delete Genre</button>
</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<script src="js/genre_index.js">

</script>