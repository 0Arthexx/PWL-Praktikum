<?php
$editedId = filter_input(INPUT_GET, 'gid');
if (isset($editedId)) {
    $genre = fetchOneGenre($editedId);
}

$updatePressed = filter_input(INPUT_POST, 'btnUpdate');
if (isset($updatePressed)) {
    $name = filter_input(INPUT_POST, 'txtName');
    if (trim($name) == '') {
        echo '<div>Please fill update genre name</div>';
    } else {
        $result = updateGenreToDb($genre['id'], $name);
        if ($result) {
            header('location:index.php?menu=genre');
        } else {
            echo '<div>Failed to update data</div>';
        }
    }
}
?>

<form method="post" class="container">
    <div class="row">
        <label for="txtName" class="col-sm-3 col-form-label">
            <h6>GENRE ID</h6>
        </label>
        <div class="">
            <input type="text" placeholder="Genre ID" readonly name="txtId" id="txtId" class="form-control" value="<?php echo $genre['id'];?>">
        </div>
    </div>

    <div class="row mt-2">
        <label for="txtName" class="col-sm-3 col-form-label">
            <h6>GENRE NAME</h6>
        </label>
        <div class="">
            <input type="text" maxlength="45" placeholder="Genre Name" name="txtName" id="txtName" class="form-control" required autofocus value="<?php echo $genre['name'];?>">
        </div>
    </div>

    <div class="row mt-4 mb-5">
        <input type="submit" value="Update Data" name="btnUpdate" class="btn btn-primary">
    </div>
</form>