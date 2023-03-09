<?php
$submitPressed1 = filter_input(INPUT_POST, 'btnSave1');
if (isset($submitPressed1)) {
    $isbn = filter_input(INPUT_POST, 'isbn');
    $title = filter_input(INPUT_POST, 'title');
    $author = filter_input(INPUT_POST, 'author');
    $publisher = filter_input(INPUT_POST, 'publisher');
    $publisheryear = filter_input(INPUT_POST, 'publisheryear');
    $genrename = filter_input(INPUT_POST, 'genrename');
    $shortdesc = filter_input(INPUT_POST, 'shortdesc'); 

    if (trim($isbn) == '' || trim($title) == '' || trim($author) == '' || trim($publisher) == '' || trim($publisheryear) == '' || trim($genrename) == '' || trim($shortdesc) == ''){
        echo '<div> Please Provid with a valid name </div>';
    } else {
        $link = new PDO('mysql:host=localhost;dbname=pwl2022', 'root', '');
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
        $link->beginTransaction();

        $query = 'INSERT INTO book(isbn, title, author, publisher, publisher_year, short_description, genre_id) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = $link -> prepare ($query);

        $stmt -> bindParam(1, $isbn, PDO::PARAM_STR);
        $stmt -> bindParam(2, $title, PDO::PARAM_STR);
        $stmt -> bindParam(3, $author, PDO::PARAM_STR);
        $stmt -> bindParam(4, $publisher, PDO::PARAM_STR);
        $stmt -> bindParam(5, $publisheryear, PDO::PARAM_INT);
        $stmt -> bindParam(6, $shortdesc, PDO::PARAM_INT);
        $stmt -> bindParam(7, $genrename, PDO::PARAM_STR);


        //        $stmt -> bindParam(2, $name);
        if ($stmt -> execute()) {
            $link -> commit();
        } else {
            $link -> rollBack();
        }
        $link = null;
    }
}

$link = new PDO('mysql:host=localhost;dbname=pwl2022', 'root', '');
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
//$query = 'SELECT isbn, title, author, publisher, publisher_year, short_description, genre_id FROM book';
$query = 'SELECT b.isbn, b.title, b.author, b.publisher, b.publisher_year, b.short_description, g.name FROM book b JOIN genre g ON b.genre_id = g.id';
$stmt = $link->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll();
$link = null;
?>
<style>
    tr {
        background-color: #FFDD59;
    }

    /*.form__group {*/
    /*    position: relative;*/
    /*    padding: 20px 0 0;*/
    /*    margin-top: 10px;*/
    /*    width: 100%;*/
    /*    max-width: 180px;*/
    /*}*/

    /*.form__field {*/
    /*    font-family: inherit;*/
    /*    width: 100%;*/
    /*    border: none;*/
    /*    border-bottom: 2px solid #9b9b9b;*/
    /*    outline: 0;*/
    /*    font-size: 17px;*/
    /*    color: #000;*/
    /*    padding: 7px 0;*/
    /*    background: transparent;*/
    /*    transition: border-color 0.2s;*/
    /*}*/

    /*.form__field::placeholder {*/
    /*    color: transparent;*/
    /*}*/

    /*.form__field:placeholder-shown ~ .form__label {*/
    /*    font-size: 17px;*/
    /*    cursor: text;*/
    /*    top: 20px;*/
    /*}*/

    /*.form__label {*/
    /*    position: absolute;*/
    /*    top: 0;*/
    /*    display: block;*/
    /*    transition: 0.2s;*/
    /*    font-size: 17px;*/
    /*    color: #9b9b9b;*/
    /*    pointer-events: none;*/
    /*}*/

    /*.form__field:focus {*/
    /*    padding-bottom: 6px;*/
    /*    font-weight: 700;*/
    /*    border-width: 3px;*/
    /*    border-image: linear-gradient(to right, #116399, #38caef);*/
    /*    border-image-slice: 1;*/
    /*}*/

    /*.form__field:focus ~ .form__label {*/
    /*    position: absolute;*/
    /*    top: 0;*/
    /*    display: block;*/
    /*    transition: 0.2s;*/
    /*    font-size: 17px;*/
    /*    color: #38caef;*/
    /*    font-weight: 700;*/
    /*}*/

    /* reset input */
    /*.form__field:required, .form__field:invalid {*/
    /*    box-shadow: none;*/
    /*}*/
</style>

<!--<div class="container m-auto">-->
<!--    <div class="row">-->
<!--        <div class="col-md-6">-->
<!--            <div class="form__group field">-->
<!--                <input required="" placeholder="Name" class="form__field" type="input">-->
<!--                <label class="form__label" for="name">ISBN</label>-->
<!--            </div>-->
<!--            <div class="form__group field">-->
<!--                <input required="" placeholder="Name" class="form__field" type="input">-->
<!--                <label class="form__label" for="name">Title</label>-->
<!--            </div>-->
<!--            <div class="form__group field">-->
<!--                <input required="" placeholder="Name" class="form__field" type="input">-->
<!--                <label class="form__label" for="name">Author</label>-->
<!--            </div>-->
<!--            <div class="form__group field">-->
<!--                <input required="" placeholder="Name" class="form__field" type="input">-->
<!--                <label class="form__label" for="name">Publisher</label>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-md-6">-->
<!--            <div class="form__group field">-->
<!--                <input required="" placeholder="Name" class="form__field" type="input">-->
<!--                <label class="form__label" for="name">Publisher Year</label>-->
<!--            </div>-->
<!--            <div class="form__group field">-->
<!--                <input required="" placeholder="Name" class="form__field" type="input">-->
<!--                <label class="form__label" for="name">Genre Name</label>-->
<!--            </div>-->
<!--            <div class="form__group field">-->
<!--                <input required="" placeholder="Name" class="form__field" type="input">-->
<!--                <label class="form__label" for="name">Short Description</label>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</div>-->

<!--<form method="post" action="">-->
<!--    <label for="isbn">isbn</label>-->
<!--    <input type="text" maxlength="45" placeholder="isbn" required autofocus name="isbn" id="isbn">-->
<!---->
<!--    <label for="title">title</label>-->
<!--    <input type="text" maxlength="45" placeholder="title" required autofocus name="title" id="title">-->
<!---->
<!--    <label for="author">author</label>-->
<!--    <input type="text" maxlength="45" placeholder="author" required autofocus name="author" id="author">-->
<!---->
<!--    <label for="publisher">publisher</label>-->
<!--    <input type="text" maxlength="45" placeholder="publisher" required autofocus name="publisher" id="publisher">-->
<!---->
<!--    <label for="publisheryear">publisher year</label>-->
<!--    <input type="text" maxlength="45" placeholder="publisher year" required autofocus name="publisheryear" id="publisheryear">-->
<!---->
<!--    <label for="shortdesc">Short Description</label>-->
<!--    <input type="text" maxlength="45" placeholder="publisher year" required autofocus name="shortdesc" id="shortdesc">-->
<!---->
<!--    <label for="genrename">genre name</label>-->
<!--    <select name="genrename" id="genrename">-->
<!--    --><?php
//    foreach ($results as $book) {
//        echo '<option value="'.$book['name'].'" >' . $book['name'] . '</option>';
//    }
//    ?>
<!--    </select>-->
<!---->
<!--    <input type="submit" value="save Data" name="btnSave1">-->
<!--</form>-->

<div class="container mt-5">
    <h1>ADD DATA</h1>
    <div class="row">

            <div class="col-md-6">
                <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ISBN</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Title</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Author</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Publisher</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
        </form>
            </div>
            <div class="col-md-6">
                <form>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Publisher Year</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Genre Name</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Short Description</label>
                        <br>
                        <textarea name="" id="" cols="84" rows="5">

                        </textarea>
                    </div>
                </form>
            </div>
        <div class="row col-md-1 m-auto">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>



    </div>

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
            echo '<td>' . $book['short_description'] . '</td>';
            echo '<td>' . $book['name'] . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>