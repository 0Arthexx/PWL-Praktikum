<?php
$link = new PDO('mysql:host=localhost;dbname=pwl2022', 'root', 'Jalankatunen01*');
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
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