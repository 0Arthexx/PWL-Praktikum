<?php
$submitPressed = filter_input(INPUT_POST, 'btnSave');
if (isset($submitPressed)) {
    $name = filter_input(INPUT_POST, 'txtName');
    if (trim($name) == ''){
        echo '<div> Please Provid with a valid name </div>';
    } else {
        $link = createMySqlConnection();
        $link->beginTransaction();
        $query = 'INSERT INTO genre(name) VALUES (?)';
//        $query = 'INSERT INTO othertable(cola, colb) VALUES (?, ?)';
        $stmt = $link -> prepare ($query);
        $stmt -> bindParam(1, $name);
//        $stmt -> bindParam(2, $name);
        if ($stmt -> execute()) {
            $link -> commit();
        } else {
            $link -> rollBack();
        }
        $link = null;
    }
}

$link = createMySqlConnection();
$query = 'SELECT id, name FROM genre';
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

<form method="post" action="">
    <label for="txtName">Genre Name</label>
    <input type="text" maxlength="45" placeholder="Genre Name" required autofocus name="txtName"id="txtName">
    <input type="submit" value="save Data" name="btnSave">
</form>

<div class="container mt-5 ">
    <table class="table mt-3 text-center" id="table">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $genre) {
            echo '<tr>';
            echo '<td>' . $genre['id'] . '</td>';
            echo '<td>' . $genre['name'] . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>