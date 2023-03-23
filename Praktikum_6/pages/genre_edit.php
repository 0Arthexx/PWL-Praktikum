<?php
$genreDao = new \dao\Genredao();
$editedId = filter_input(INPUT_GET,'gid');
if(isset($editedId)){
    $genre = $genreDao->fetchOneGenre($editedId);
}
$updatePressed = filter_input(INPUT_POST,'btnUpdate');
if(isset($updatePressed)){
    $name = filter_input(INPUT_POST,'textName');
    if(trim($name) == ''){
        echo '<div class="text-center">Please provide with a valid name</div>';
    }else{
        // create a new instance of Genre with the updated name
        $genreToUpdate = new \entity\Genre();
        $genreToUpdate->setId($genre->getId());
        $genreToUpdate->setName($name);

        // pass the new instance of Genre to the updateGenreToDb() method
        $results = $genreDao->updateGenreToDb($genreToUpdate);
        if($results){
            header('location:index.php?menu=genre');
        }else{
            echo '<div>Failed to add data</div>';
        }
    }
}
?>

<div class="container" style="height:100vh">
    <div class="row d-flex text-start justify-content-center my-3">
        <div class="col-md-6">
            <form method="post">
                <div class="mb-3">
                    <label for="idGenre" class="form-label">Genre ID</label>
                    <input type="text" class="form-control" id="idGenre" maxlength="45"   placeholder="Genre ID" readonly value="<?php echo($genre->getId()); ?>">
                </div>
                <div class="mb-3">
                    <label for="namaGenre" class="form-label">Genre Name</label>
                    <input type="text" class="form-control" name="textName" id="namaGenre" maxlength="45" required autofocus value="<?php echo($genre->getName()); ?>" placeholder="Genre Name">
                </div>
                <button type="submit" class="btn btn-primary" name="btnUpdate">Update Data</button>
            </form>
        </div>
    </div>
</div>


<?php
    $genreDao = new \dao\Genredao();
    $editedId = filter_input(INPUT_GET,'gid');
    if(isset($editedId)){
        $genre = $genreDao->fetchOneGenre($editedId);
    }
    $updatePressed = filter_input(INPUT_POST,'btnUpdate');
    if(isset($updatePressed)){
        $name = filter_input(INPUT_POST,'textName');
        if(trim($name) == ''){
            echo '<div class="text-center">Please provide with a valid name</div>';
        }else{
            $results = $genreDao->updateGenreToDb($name);
            if($results){
                header('location:index.php?menu=genre');
            }else{
                echo '<div>Failed to add data</div>';
            }
        }
    }
?>
<!---->
<!--<div class="container" style="height:100vh">-->
<!--   <div class="row d-flex text-start justify-content-center my-3">-->
<!--        <div class="col-md-6">-->
<!--            <form method="post">-->
<!--            <div class="mb-3">-->
<!--                    <label for="idGenre" class="form-label">Genre ID</label>-->
<!--                    <input type="text" class="form-control" id="idGenre" maxlength="45"   placeholder="Genre ID" readonly value="--><?php //echo($genre->getId()); ?><!--">-->
<!--                </div>-->
<!--                <div class="mb-3">-->
<!--                    <label for="namaGenre" class="form-label">Genre Name</label>-->
<!--                    <input type="text" class="form-control" name="textName" id="namaGenre" maxlength="45" required autofocus value="--><?php //echo($genre->getName()); ?><!--" placeholder="Genre Name">-->
<!--                </div>-->
<!--                <button type="submit" class="btn btn-primary" name="btnUpdate">Update Data</button>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->